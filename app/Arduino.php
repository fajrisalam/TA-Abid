<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Arduino extends Model
{
    //
    public function karyawan(){
        return $this->hasMany('App\Karyawan');
    }
}
