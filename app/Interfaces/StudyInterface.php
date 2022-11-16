<?php

namespace App\Interfaces;

interface StudyInterface {
    public function getAllStudies();

    public function getStudy($id);    

    public function createStudyPost($input);
}

?>