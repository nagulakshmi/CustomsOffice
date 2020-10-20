<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class FileDetails extends Model
{
    protected $table = 'file_details';

    public function fileMaster()
    {
        return $this->belongsTo('App\Http\Models\FileMaster');
    }
}
