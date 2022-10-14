<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{
    // send JSON format data
    public function login() {
        // 선택된 메뉴
        $sel_menu = "";

        return view('contents/auth/login');
    }

    // send JSON format data
    public function signUp() {   
        return view('contents/auth/signUp');
    }

    public function sign_up_process(Request $req) {

        // 데이터 유효성 검사
        $validated = Validator::make($req->all(), [
            'username' => ['required', 'max:50'],
            'userid' => ['required', 'max:50'],
            'useremail' => ['required', 'Email'],
            'password' => ['required', 'max:50'],
            'phone' => ['digits:10']
        ]);

        if ($validated->fails()) {
            // 유효성 실패 시
        }

        $isExist = User::where('user_name', $req->username)
                        ->orwhere('user_id', $req->userid)
                        ->orwhere('email', $req->useremail)
                        ->first();
                        
        if($isExist == null) {
            $data = User::create([
                'user_name' => $req->username,
                'user_id' => $req->userid,
                'email' => $req->useremail,
                'phone' => $req->phone,
                'password' => $req->password,
                // 'create_time' => useCurrent(),
            ]);
            $data->save();

            // 데이터 저장 후에 동작
        }

        // 데이터 저장 후에 동작
    }
}