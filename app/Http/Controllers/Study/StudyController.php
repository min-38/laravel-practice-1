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
    public function list() {
        // code here
    }

    // 게시글 등록
    public function write(Request $req) {
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

            $board = null;

            try {
                $board = Study::create([
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

            if($board != null) {
                return redirect('/study/view/' . $board->id)
                        ->with('success', true)
                        ->with('msg', $msg);
            }
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
}