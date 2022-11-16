<?php

namespace App\Repositories;

use App\Models\Attachment;
use App\Models\AtchParent;
use App\Interfaces\FileInterface;

class FileRepository implements FileInterface {

    public function getFile($post_id) {
        return Attachment::join('atch_parent', 'atchid', '=', 'attachments.id')
                    ->where('atch_parent.pid', $post_id)
                    ->select('attachments.*')
                    ->get();
    }

    public function createFilePost($file, $name, $path) {
        return Attachment::create([
            'atch_name' => $file->getClientOriginalName(),
            'atch_chg_name' => $name,
            'atch_ext' => $file->getClientOriginalExtension(),
            'atch_mime' => $file->getMimeType(),
            'atch_size' => $file->getSize(),
            'path' => $path,
        ]);
    }

    public function relatePostnFile($post_id, $file_ids) {
        for($i = 0; $i < count($file_ids); $i++) {   
            AtchParent::create([
                'pid' => $post_id,
                'atchid' => $file_ids[$i],
            ]);
        }
    }

        // AtchParent::create([
        //     'id' => $study->id,
        //     'atchid' => $atch->id,
        // ]);

        // AtchParent::create([
        //     'id' => $study->id,
        //     'atchid' => $atch->id,
        // ]);
}