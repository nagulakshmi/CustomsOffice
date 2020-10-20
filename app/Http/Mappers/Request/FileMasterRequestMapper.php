<?php

namespace App\Http\Mappers\Request;

use App\Http\Models\FileMaster;

class FileMasterRequestMapper {

    public function mapToAddFileMasterRequest($request) {
        $file_master = new FileMaster();
        $file_master = $this->mapRequestFields($file_master, $request);
        return $file_master;
    }

    public function mapToUpdateFileMasterRequest($request) {
        $file_master = $this->mapToAddFileMasterRequest($request);
        if (!empty($request['edit_id'])) {
            $file_master = FileMaster::where('id', $request['edit_id'])->first();
            $file_master = $this->mapRequestFields($file_master, $request);
        } 
        return $file_master;
    }

    public function mapRequestFields($file_master, $request) {
        $file_master->file_refno = $request['file_refno'];
        $file_master->file_name = $request['file_name'];
        $file_master->file_subject = $request['file_subject'];
        $file_master->assigned_to = $request['assigned_to'];
        $file_master->description = $request['description'];
        $file_master->file_status = '1'; // New file status hardcoded
        return $file_master;
    }

}