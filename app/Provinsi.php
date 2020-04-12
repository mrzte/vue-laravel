<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provinsi extends Model
{
    protected $table = 'provinsi';
    protected $fillable = ['id','provinsi','meta'];

    public function lembaga(){
        return $this->belongsTo('App\Lembaga','provinsi');
    }

    public function kota(){
        return $this->belongsTo('App\Kota','province_id');
    }
}
