<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Http\Model\FileMaster;
use App\Http\Model\FileStatus;

class FileStatusService {

    public function retrieveFileStatuses() {
        return FileStatus:: orderBy('id')
        ->get();
    }

    public function showFileStatus(int $status) {
        if ($status != 0) {
            return FileMaster::where('file_status', $status)->orderBy('id')->get();
        }
        return FileMaster::orderBy('id')->get();
    }

}