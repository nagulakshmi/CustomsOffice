<?php

namespace App\Http\Services;

use App\Http\Models\FileMaster;
use App\Http\Models\FileStatus;
use App\Http\Mappers\Request\FileMasterRequestMapper;
use App\Http\Mappers\Request\FileDetailsRequestMapper;

use File;

class FileStatusService
{

    public function retrieveFileStatuses()
    {
        return FileStatus::orderBy('id')
            ->get();
        return [];
    }

    public function showFileStatus(int $status)
    {
        if ($status != 0) {
            return FileMaster::where('file_status', $status)->orderBy('id')->paginate(5);
        }
        return FileMaster::orderBy('id')->paginate(5);
    }

    public function saveFileMaster($fileMasterRequest)
    {
        $actualRequest = $fileMasterRequest['data']['files'];
        if (!empty($actualRequest['edit_id'])) { //edit request
            $request = (new FileMasterRequestMapper())->mapToUpdateFileMasterRequest($actualRequest);    
        } else {
            $request = (new FileMasterRequestMapper())->mapToAddFileMasterRequest($actualRequest);
        }
        $status = $request->save();
        $fileMasterId = $request->id;
        if ($status && !empty($fileMasterRequest['file_upload'])) { // file master create successfully
            $this->uploadFile($fileMasterRequest['file_upload'], $fileMasterId);
        }
        return $request->id;
    }

    public function uploadFile($file_upload, $fileMasterId) {
        $filedir = '/Anjal_Mgmt/'. $fileMasterId . '/';
        $uploaddir = base_path() . '/public' . $filedir;
        if ($file_upload != "" && $file_upload != null) {
            File::isDirectory($uploaddir) or File::makeDirectory($uploaddir, 0777, true, true);
            foreach ($file_upload as $file) {
                $file_name = $file->getClientOriginalName();
                $file->move($uploaddir, $file_name);
                $file_url = $uploaddir . $file_name;

                $request = (new FileDetailsRequestMapper)->mapToAddFileDetailsRequestMapper($fileMasterId, $file_name, $file_url);
                $request->save();
            }
        }
    }

    public function viewFileMasterById(int $id)
    {
        return FileMaster::where('id', $id)->first();
    }

}
