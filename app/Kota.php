<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    protected $table = 'kota';
    protected $fillable = ['province_id','kota','meta'];

    public function provinsi(){
        return $this->hasMany('App\Provinsi','id','id');    
    
    }

    public function kota(){
        return $this->belongsTo('App\Lembaga','kota');
    }
}