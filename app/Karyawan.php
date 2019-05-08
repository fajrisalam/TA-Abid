<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
	protected $table = 'karyawans';
    protected $fillable = ['id_arduino'];
    

    public function arduino(){
        return $this->belongsTo('App\Arduino', 'id_arduino');
    }

    public function log(){
        return $this->hasMany('App\Log');
    }
}
