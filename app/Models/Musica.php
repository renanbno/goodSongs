<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Musica extends Model
{
    use HasFactory;

    protected $fillable = [
        
        'nome', 
        'duracao', 
        'artista', 
        'genero', 
        'nacionalidade', 
        'data', 
        'album',
    ];
}
