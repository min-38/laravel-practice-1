<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash; // 패스워드 암호화
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    // send JSON format data
    public function login() {
        return view('contents.auth.login');
    }

    // 로그인 과정
    public function login_process(Request $req) {
        $credentials = $req->validate([
            'userid' => ['required', 'string', 'max:50'],
            'password' => ['required', Password::min(8)]
        ]);

        if (Auth::attempt(['user_id' => $credentials['userid'], 'password' => $credentials['password']])) {
            $req->session()->regenerate();
            $req->session()->put('username', Auth::user()->user_name);
            $req->session()->put('userid', Auth::user()->user_id);

            return redirect('/')->withSuccess('You have Successfully loggedin');
        }
        return redirect()->back()->withErrors('Oppes! You have entered invalid credentials');
    }

    // 로그아웃 처리
    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->back();
            //->with('message','logout succesful');
    }

    // send JSON format data
    public function register() {
        return view('contents.auth.signUp');
    }

    public function register_process(Request $req) {
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