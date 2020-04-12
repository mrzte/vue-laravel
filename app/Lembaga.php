<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lembaga extends Model
{
    protected $table = 'pdpt_detail';
    protected $guard = 'lembaga';

    protected $fillable = ['id','kode','nama','email','alamat','phone','provinsi','kota','logo','kode_pos'];

    public function provinsi(){
        return $this->hasMany('App\Provinsi','id','id');
    }

    public function kota(){
        return $this->hasMany('App\Kota','id','id');
    }

    public function user(){
        return $this->belongsTo('App\User','kode');
    }
}
