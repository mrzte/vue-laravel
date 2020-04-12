<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pertanyaan extends Model
{
    protected $table = 'pertanyaan';
    protected $primaryKey = 'id_pertanyaan';
    protected $fillable = ['id_indikator','pertanyaan','petunjuk','jenis','periode','urutan','level','id_pertanyaan'];
}
