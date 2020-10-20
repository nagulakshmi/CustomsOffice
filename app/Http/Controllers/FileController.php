<?php

namespace App\Http\Controllers;
use App\Http\Services\FileStatusService;
use App\Http\Models\FileMaster;
use App\User;

use Illuminate\Http\Request;

class FileController extends Controller
{
    public function Create()
    {
        $officer = User:: orderBy('id')->get();
        return view('create',compact('officer'));
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

    public function fileCreate(Request $request) {
        $file_data = $request->all();
        $officer = User:: orderBy('id')->get();
        $file_upload = "" ;
       $filesupload_data = (new FileStatusService())->saveFileData($file_data,$file_upload);       
        
        $fileList = (new FileStatusService())->showFileStatus($filesupload_data);
        return view('filestatuslist', compact(
            'fileList','officer'
        ));

        //  print_r($filesupload_data->getContent());
  
    }
    public function filedataupdate(Request $request){
        $officer = User:: orderBy('id')->get();
        $statuses = (new FileStatusService())->retrieveFileStatuses();
        $fileupdated_data = (new FileStatusService())->fileUpdate($request->id);
        
        return view('fileupdate',compact('fileupdated_data','officer','statuses'));

    }
}

