<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    //
    protected $fillable = ['id_karyawan', 'id_arduino'];

    public function karyawan(){
        return $this->BelongsTo('App\Karyawan', 'id_karyawan', 'rfid');
    }
    public function arduino(){
        return $this->BelongsTo('App\Arduino', 'id_arduino');
    }
}
