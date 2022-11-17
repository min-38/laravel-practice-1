<?php

namespace App\Http\Controllers\Board;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash; // 패스워드 암호화

// models
use App\Models\Post;
use App\Models\Attachment;
use App\Models\AtchParent;

// Interfaces
use App\Interfaces\StudyInterface;
use App\Interfaces\FileInterface;

class StudyController extends Controller
{
    public $study, $file;

    public function __construct(StudyInterface $study, FileInterface $file) {
        $this->study = $study;
        $this->file = $file;
    }

    // 게시글 목록
    public function index(Request $req) {
        $studies = $this->study->getAllStudies();
        return view('contents.study.list', compact('studies'));
    }

    // 게시글 뷰
    public function view(Request $req) {
        $study = $this->study->getStudy($req->id);
        $files = $this->file->getFile($study->id);

        if($study != null) {
            return view('contents.study.view', compact('study', 'files'));
        }
        return redirect('/study/list')->with('msg', '존재하지 않는 게시글입니다.');
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

            if($req->id != null) {
                $study = Post::where('deleted_at', null)
                            ->where('id', $req->id)
                            ->where('writer', $req->session()->get('userpid'))
                            ->select('id', 'title', 'content', 'writer')->first();
                
                if($study != null) {
                    $action = "수정";
                    $actionTo = route('studyUpdate', $study->id);
                }
            }
            return view('contents.study.write', compact('study', 'action', 'actionTo'));
        }

        return redirect()->back()
                ->withInput()
                ->with('error', true)
                ->with('msg', $msg);
    }

    // 게시글 등록 진행
    public function store(Request $req) {
        // 데이터 유효성 검사
        $validator = Validator::make($req->all(), [
            'studyTitle' => ['required', 'string', 'max:50'],
            'studyContent' => ['required', 'string'],
            'private' => ['string'],
            'password' => ['string'],
            'uploadFiles.*' => ['file', 'max:10000000']
        ]);

        $msg = "";
        if ($validator->fails()) { // 유효성 실패 시
            $msg = "validate error";
            echo $msg;exit;
        } else {
            $data = $req->all();
            $data = $this->ValidatePrivate($data);
            $data['writer'] = $req->session()->get('userpid');

            $post_id = $this->study->createStudyPost($data)->id;
            
            $fileIds = array();
            if($req->uploadFiles != null) {
                foreach($req->uploadFiles as $file) {

                    $orgFilename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                    $name = MD5(time() . "_" . $orgFilename) . ".bin";

                    $fileId = $this->file->createFilePost($file, $name, public_path('board'))->id;
                    array_push($fileIds, $fileId);

                    $file->move(public_path('board'), $name);
                }
                
                $this->file->relatePostnFile($post_id, $fileIds);
            }
            
            

            return redirect(route('studyView', $post_id))
                        ->with('success', true)
                        ->with('msg', $msg);
        }

        return redirect()->back()
                ->withInput()
                ->with('error', true)
                ->with('msg', $msg);
    }

    // 게시글 수정
    public function update(Request $req, $id) {
        // You don't have permission to write
        if(!$req->session()->get('login') || $req->session()->get('rank') > 1) { // rank 0, 1
            // 글 작성 권한 없음
            return redirect()->back()->withErrors('You don\'t have permission to write');
        }

        // 데이터 유효성 검사
        $validator = Validator::make($req->all(), [
            'studyTitle' => ['required', 'string', 'max:50'],
            'studyContent' => ['required', 'string'],
        ]);

        $msg = "";
        if ($validator->fails()) { // 유효성 실패 시
            $msg = "validate error";
        } else {
            $updated = true; // 업데이트 성공 여부

            try {
                // post 찾기
                $post = Post::findOrfail($id);
                
                // post 수정
                $post->title = $req->studyTitle;
                $post->content = $req->studyContent;
                $post->save();

                $msg = "수정되었습니다";
            } catch (\Exception $e) {
                // 에러 로그 기록 필요
                $msg = "수정 실패";
                $updated = false;
            }

            return redirect(route('studyView', $id))
                        ->with('success', $updated)
                        ->with('msg', $msg);
        }
        return redirect()->back()
                ->withInput()
                ->with('error', true)
                ->with('msg', $msg);
    }

    private function ValidatePrivate($data) {
        if(!isset($data['private']) || $data['private'] != 'on') {
            $data['private'] = 'N';
            $data['password'] = null;
        } else {
            if($data['password'] == null) {
                $data['private'] = 'N';
                $data['password'] = null;
            } else {
                $data['private'] = 'Y';
            }
            
            
        }
        
        return $data;
    }
}