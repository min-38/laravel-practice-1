<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

// Interfaces
use App\Interfaces\FileInterface;
use Illuminate\Support\Facades\Storage;

class DownloadController extends Controller
{
    //
    // public function __construct(DownloadInterface $study) {
    //     $this->study = $study;
    //     $this->file = $file;
    // }
    public $file;

    public function __construct(FileInterface $file) {
        $this->file = $file;
    }

    public function Download(Request $req) {
        $file = $this->file->downFile($req->fileName);
        if($file != null) {
            $res = null;
            try {
                $fullPath = public_path('board') . '/' . $req->fileName . '.bin';
                $res = response()->download($fullPath, $file->atch_name);
            } catch(\Exception $e) {
                echo $e;
                exit;
            }
            return $res;
        }
    }
}
