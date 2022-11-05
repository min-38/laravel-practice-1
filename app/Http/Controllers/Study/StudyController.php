<?php

namespace App\Http\Controllers\Study;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash; // 패스워드 암호화
use App\Models\Study;

class StudyController extends Controller
{
    // 게시글 목록
    public function list(Request $req) {

        $studies = Study::join('users', 'study_writer', '=', 'users.upid')
                    ->where('study.deleted_at', null)
                    ->where('users.deleted_at', null)
                    ->orderByDesc('created_at')
                    ->paginate(
                        $perPage = 10, $columns = ['study.*', 'users.user_name as userName'], $pageName = 'page'
                    );
        
        return view('contents.study.list', compact('studies'));
        
    }

    // 게시글 작성/수정 view 출력
    public function write(Request $req) {
        // You don't have permission to write
        if(!$req->session()->get('login') || $req->session()->get('rank') > 1) { // rank 0, 1
            // 글 작성 권한 없음
            return redirect()->back()->withErrors('You don\'t have permission to write');
        }

        // 데이터 유효성 검사
        $validator = Validator::make($req->all(), [
            'id' => ['integer', 'nullable'],
        ]);

        if ($validator->fails()) { // 유효성 실패 시
            $msg = "validate error";
        } else {
            $study = null;
            $action = "등록";
            $actionTo = route('studyUpload');
            $method = "POST";

            if($req->id != null) {
                $study = Study::where('deleted_at', null)
                            ->where('study_id', $req->id)
                            ->select('study_id', 'study_title', 'study_content', 'study_writer')->first();
                
                if($req->session()->get('rank') != 0 && $req->session()->get('userpid') != $study->id) {
                    $study = null;
                } else {
                    $action = "수정";
                    $actionTo = route('studyUpdate');
                    $method = "PUT";
                }
            }
            return view('contents.study.write', compact('study', 'action', 'actionTo', 'method'));
        }
        return redirect()->back()
                ->withInput()
                ->with('error', true)
                ->with('msg', $msg);
    }

    // 게시글 등록 진행
    public function upload(Request $req) {
        // 데이터 유효성 검사
        $validator = Validator::make($req->all(), [
            'studyTitle' => ['required', 'string', 'max:50'],
            'studyContent' => ['required', 'string'],
        ]);

        $msg = "";
        if ($validator->fails()) { // 유효성 실패 시
            $msg = "validate error";
        } else {
            $req = $this->ValidatePrivate($req);

            $study = null;

            try {
                $study = Study::create([
                    'study_title' => $req->studyTitle,
                    'study_content' => $req->studyContent,
                    'study_writer' => $req->session()->get('userpid'),
                    'isPrivate' => $req->private,
                    'password' => Hash::make($req->password),
                ]);

                $msg = "등록되었습니다";
            } catch (\Exception $e) {
                // 에러 로그 기록 필요
                $msg = "등록 실패";
            }

            if($study != null) {
                return redirect('/study/view/' . $study->id)
                        ->with('success', true)
                        ->with('msg', $msg);
            }
        }
        return redirect()->back()
                ->withInput()
                ->with('error', true)
                ->with('msg', $msg);
    }

    // 게시글 수정
    public function update(Request $req) {
        // You don't have permission to write
        if(!$req->session()->get('login') || $req->session()->get('rank') > 1) { // rank 0, 1
            // 글 작성 권한 없음
            return redirect()->back()->withErrors('You don\'t have permission to write');
        }

        // 데이터 유효성 검사
        $validator = Validator::make($req->all(), [
            'studyTitle' => ['required', 'string', 'max:50'],
            'studyContent' => ['required', 'string'],
            'id' => ['required', 'integer']
        ]);

        $msg = "";
        if ($validator->fails()) { // 유효성 실패 시
            $msg = "validate error";
        } else {
            $updated = true; // 업데이트 성공 여부

            try {
                Study::where('study_id', $req->id)
                    ->where('deleted_at', null)
                    ->update(['study_title' => $req->studyTitle], ['study_content' => $req->studyContent], ['updated_at' => 'NOW()']);

                $msg = "수정되었습니다";
            } catch (\Exception $e) {
                // 에러 로그 기록 필요
                $msg = "수정 실패";
                $updated = false;
            }

            return redirect('/study/view/' . $req->id)
                        ->with('success', $updated)
                        ->with('msg', $msg);
        }
        return redirect()->back()
                ->withInput()
                ->with('error', true)
                ->with('msg', $msg);
    }

    private function ValidatePrivate($req) {
        if($req->private != 'on') {
            $req->private = 'N';
            $req->password = null;
        } else {
            if($req->password == null) {
                $req->private = 'N';
            } else {
                $req->private = 'Y';
            }
        }
        return $req;
    }

    public function view(Request $req) {
        $study = Study::join('users', 'study_writer', '=', 'users.upid')
                    ->where('study.deleted_at', null)
                    ->where('users.deleted_at', null)
                    ->where('study_id', $req->id)
                    ->select('study.*', 'users.user_name as userName')->first();
                    // ->first();

        if($study != null) {
            return view('contents.study.view', compact('study'));
        }
        return redirect('/study/list')->with('msg', '존재하지 않는 게시글입니다.');
    }
}