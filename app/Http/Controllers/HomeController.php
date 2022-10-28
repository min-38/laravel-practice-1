<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    // send JSON format data
    public function index() {
        
        // 데이터 가져오기
        return view('contents/home');
    }
}