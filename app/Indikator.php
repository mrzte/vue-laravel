<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Indikator extends Model
{
    protected $table = 'indikator';
    protected $primaryKey = 'id_indikator';
    protected $guarded = [];
    protected $fillable = ['id_pilar','indikator','definisi'];
}
