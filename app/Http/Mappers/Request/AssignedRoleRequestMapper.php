<?php

namespace App\Http\Mappers\Request;

use App\Http\Models\FileMaster;

class AssignedRoleRequestMapper {

    public function mapToAssignedRole($request) {
        $file_master = new FileMaster();
        $file_master = $this->mapRequestFields($file_master, $request);
        return $file_master;
    }

   

}