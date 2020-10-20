<?php

namespace App\Http\Mappers\Request;

use App\Http\Models\FileDetails;

class FileDetailsRequestMapper {

    public function mapToAddFileDetailsRequestMapper($fileMasterId, $fileName, $fileUrl) {
        $fileDetails = new FileDetails();
        $fileDetails->file_master_id = $fileMasterId;
        $fileDetails->file_name = $fileName;
        $fileDetails->file_url = $fileUrl;
        return $fileDetails;
    }
}