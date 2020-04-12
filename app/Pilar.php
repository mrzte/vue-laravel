<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pilar extends Model
{
    protected $table = 'pilar';
    protected $fillable = ['pilar','deskripsi'];
}
