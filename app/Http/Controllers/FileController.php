<?php

namespace App\Http\Controllers;

use App\Http\Services\FileStatusService;
use App\User;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function Create()
    {
        $officer = User::orderBy('id')->get();
        return view('create', compact('officer'));
    }

    public function retrieveFileStatusMaster()
    {
        $statuses = (new FileStatusService())->retrieveFileStatuses();
    }

    public function showFileStatus(Request $request)
    {
        $fileList = (new FileStatusService())->showFileStatus($request->status_id);
        return view('filestatuslist', compact(
            'fileList'
        ));
    }

    public function createOrUpdateFileMaster(Request $request)
    {
        $fileMasterId = (new FileStatusService())->saveFileMaster($request->all());
        if (!empty($fileMasterId)) {
            return redirect()->route('latestfilelist', ['status_id' => 1]);
        }
    }

    public function viewFileMasterById(Request $request)
    {
        $officer = User::orderBy('id')->get();
        $statuses = (new FileStatusService())->retrieveFileStatuses();
        $fileMaster = (new FileStatusService())->viewFileMasterById($request->id);
        return view('fileupdate', compact('fileMaster', 'officer', 'statuses'));
    }
}
