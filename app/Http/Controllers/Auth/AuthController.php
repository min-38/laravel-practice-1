<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash; // 패스워드 암호화
use App\Models\User;

class AuthController extends Controller
{
    // send JSON format data
    public function login() {
        return view('contents/auth/login');
    }

    // send JSON format data
    public function signUp() {   
        return view('contents/auth/signUp');
    }

    public function signUp_process(Request $req) {
        // 데이터 유효성 검사
        $validator = Validator::make($req->all(), [
            'username' => ['required', 'string', 'max:50'],
            'userid' => ['required', 'string', 'max:50'],
            'useremail' => ['required', 'email'],
            'userphone' => ['nullable', 'digits:10'],
            'password' => ['required', Password::min(8)]
        ]);

        $msg = "";

        if ($validator->fails()) { // 유효성 실패 시
            $msg = "validate error";
            echo "123";exit;
        } else {
            $user = null;

            try {
                $user = User::create([
                    'user_name' => $req->username,
                    'user_id' => $req->userid,
                    'email' => $req->useremail,
                    'phone' => $req->phone,
                    'password' => Hash::make($req->password),
                    // 'create_time' => useCurrent(),
                ]);

                $msg = "회원가입 되었습니다. 로그인해주세요.";
            } catch (\Exception $e) {
                if ($e->getCode() == 23000) { // Unique Error
                    // redirect()->route('login')->with('success', 'Sign Up Success!');
                    $msg = "이미 계정이 존재합니다.";
                }
            }

            if($user != null) {
                return redirect('login')
                        ->with('success', true)
                        ->with('msg', $msg);
            }
        }

        return redirect()->back()
                ->withInput()
                ->with('success', false)
                ->with('msg', $msg);
                // ->json($validator->errors(), 422);
    }
}