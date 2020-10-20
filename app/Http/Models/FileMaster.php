<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class FileMaster extends Model
{
    protected $table = 'file_masters';

    public function fileDetails(){
        return $this->hasMany('App\Http\Models\FileDetails');
    }
}
