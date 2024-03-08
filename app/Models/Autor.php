<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;
    
    protected $fillable = ['nombre','apellidos','user_id','estado',];

    // Funcion para recibir el número de novelas del autor
    public function novelas() {
        return $this->hasMany(Novela::class, 'autores_autor_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
