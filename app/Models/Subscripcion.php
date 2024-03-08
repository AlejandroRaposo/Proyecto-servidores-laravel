<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscripcion extends Model
{
    use HasFactory;
    protected $fillable = ['nombre','duracion','descripcion','precio','num_capitulos','tipo',];

}
