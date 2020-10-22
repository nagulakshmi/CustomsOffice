<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class FileMaster extends Model
{
    protected $table = 'file_masters';

    public function fileDetails(){
        return $this->hasMany('App\Http\Models\FileDetails');
    }
    public function user()
    {
        return $this->belongsTo('App\User','assigned_to');
    }

}
