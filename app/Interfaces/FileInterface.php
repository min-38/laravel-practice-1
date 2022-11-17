<?php

namespace App\Interfaces;

interface FileInterface {
    public function getFile($post_id);

    public function createFilePost($file, $name, $path);

    public function relatePostnFile($post_id, $file_ids);
<<<<<<< HEAD

    public function downFile($fileName);
}
=======
}

>>>>>>> main
?>