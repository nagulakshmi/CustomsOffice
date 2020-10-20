<?php

namespace App\Http\Services;

use Illuminate\Http\Request;
use App\Http\Models\FileMaster;
use App\Http\Models\FileStatus;
use File;

class FileStatusService {

    public function retrieveFileStatuses() {
        return FileStatus:: orderBy('id')
        ->get();
    }

    public function showFileStatus(int $status) {
        if ($status != 0) {
            return FileMaster::where('file_status', $status)->orderBy('id')->paginate(5);
        }
        return FileMaster::orderBy('id')->paginate(5);
    }
    
    public function saveFileData($file_data,$file_upload)
    {
        $data = $file_data['data']['files'];
        $edit_data = $data['edit_id'];
        $filedir = '/Filecopy/';
        $uploaddir = base_path() . '/public' . $filedir;
       if($file_upload != "" && $file_upload!= null )
        {

            File::isDirectory($uploaddir) or File::makeDirectory($uploaddir, 0777, true, true);
            foreach($file_upload as $files){
                $uploadfilename =$files->getClientOriginalName();            
                $file_upload->move($uploaddir, $uploadfilename);
                $uploaded_filename =  $uploaddir . $uploadfilename; 
            }
            $file_uploaddata->file_upload = $uploaded_filename;       
        }

        $file_uploaddata = new FileMaster();
        $file_uploaddata->file_refno =  $data['file_refno'];
        $file_uploaddata->file_name =  $data['file_name'];
        $file_uploaddata->file_subject =  $data['file_subject'];
        $file_uploaddata->assigned_to =  $data['assigned_to'];
        $file_uploaddata->description =  $data['description'];
        if(!empty($edit_data) )
        {
            $file_uploaddata->file_status =  $edit_data; 
        }else{
            $file_uploaddata->file_status =  '1';   
        }

        $file_uploaddata->file_upload = "";           
        $file_uploaddata->save();
        return $file_uploaddata->file_status;

    //    return response()->json(array('success' => true, 'last_insert_id' => $file_uploaddata->id), 200);
    //    return back()->with('sucess','Your data saved');



    }

    public function fileUpdate(int $id){

        return FileMaster::where('id', $id)->first();
    
        
    }

}