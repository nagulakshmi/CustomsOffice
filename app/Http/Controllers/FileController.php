<?php

namespace App\Http\Controllers;

use App\Http\Services\FileStatusService;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function Create()
    {
        return view('create');
    }

    public function retrieveFileStatusMaster() {
        $statuses = (new FileStatusService())->retrieveFileStatuses();
    }

    public function showFileStatus(Request $request) {
        $fileList = (new FileStatusService())->showFileStatus($request->status_id);
        return view('filestatuslist', compact(
            'fileList'
        ));
    }
}
