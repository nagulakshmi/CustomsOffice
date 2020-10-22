<?php

namespace App\Http\Controllers;

use App\Http\Services\FileStatusService;
use App\User;
use Illuminate\Http\Request;
use App\Http\Models\FileMaster;

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
       
      if(!empty($request->status_id))
      {
       
        $officer = User::orderBy('id')->get();        
        $fileList = (new FileStatusService())->showFileStatus($request->status_id);
      }
      elseif($request->status_id == 0)
      {
        
            $officer = User::orderBy('id')->get();  
            $fileList = (new FileStatusService())->showFileStatus($request->status_id);
        
        if(($request->searchykey) || ($request->assigned_to) || ($request->fromdate) ||  ($request->todate))
        {
            $officer = User::orderBy('id')->get();        
            $fileList = FileMaster::orderBy('id');   
            $fromdate = (!empty($request->fromdate))?date('Y-m-d',strtotime($request->fromdate)):"";
            $todate = (!empty($request->todate))?date('Y-m-d',strtotime($request->todate)):"";
            
            if(!empty($fromdate) && !empty($todate) && $fromdate == $todate){
                $fileList = $fileList->where('created_at', $fromdate)->orderBy('id');
               
            }else{
                if(!empty($fromdate))
                {
                    $fileList = $fileList->where('created_at', '>=', $fromdate)->orderBy('id');
                }
                if(!empty($request->todate))
                {
                    $fileList = $fileList->where('created_at', '<=', $todate)->orderBy('id');
                }
    
            }
            if(!empty($request->searchkey))
            {
                $fileList = $fileList->where('file_name', 'LIKE', '%' .$request->searchkey. '%' )->orderBy('id');
                            // ->orWhere('file_subject', 'like', '%' . $request->searchkey. '%')
                            // ->orWhere('file_refno', 'like', '%' . $request->searchkey. '%');
            
            }
            if(!empty($request->assigned_to))
            {
                $fileList = $fileList->where('assigned_to', $request->assigned_to );                          
            
            }
		

             $fileList = $fileList->paginate(5);
        }

      }
     
       
        return view('filestatuslist', compact(
            'fileList','officer'
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
    public function deleteFileById(Request $request)
    {
        print_r("am here");
        exit;
        $fileList = (new FileStatusService())->deleteFileById($request->id);
        return redirect()->route('latestfilelist', ['status_id' => 1]);
    }
}
