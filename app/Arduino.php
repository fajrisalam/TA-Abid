<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Arduino extends Model
{
    //
    protected $table = 'arduinos';
    
    public function karyawan(){
        return $this->hasMany('App\Karyawan');
    }
}
