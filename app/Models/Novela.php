<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Novela extends Model
{
    use HasFactory;

    protected $with = ['autor'];
    protected $fillable = ['nombre','descripcion','categoria','autores_autor_id','estado','edad_minima',];

    // Para saber que autor está asociado a esta novela
    // hay que crear un método que tiene asociado un
    // único autor
    public function autor()
    {
        return $this->belongsTo(Autor::class, 'autores_autor_id', 'id');
    }

    
}
