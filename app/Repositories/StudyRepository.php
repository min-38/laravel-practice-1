<?php

namespace App\Repositories;

use Illuminate\Support\Facades\Hash; // 패스워드 암호화

// models
use App\Models\Post;

// interface
use App\Interfaces\StudyInterface;



class StudyRepository implements StudyInterface {
    
    public function getAllStudies() {
        return Post::join('users', 'writer', '=', 'users.id')
                    ->where('posts.post_type', 1)
                    ->where('posts.deleted_at', null)
                    ->where('users.deleted_at', null)
                    ->latest()
                    ->paginate(
                        $perPage = 10, $columns = ['posts.*', 'users.user_name as userName'], $pageName = 'page'
                    );
    }

    public function createStudyPost($input) {
        // dd($input);exit;
        return Post::create([
            'post_type' => 1,
            'title' => $input['studyTitle'],
            'content' => $input['studyContent'],
            'writer' => $input['writer'],
            'isPrivate' => $input['private'],
            'password' => $input['password'],
        ]);
    }

    public function getStudy($id) {
        return Post::join('users', 'writer', '=', 'users.id')
                    ->where('posts.id', $id)
                    ->where('posts.deleted_at', null)
                    ->where('users.deleted_at', null)
                    ->select('posts.*', 'users.user_name as userName')->first();
    }
}