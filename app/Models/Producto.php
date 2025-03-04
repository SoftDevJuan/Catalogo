<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    // Define los campos que se pueden asignar masivamente
    protected $fillable = ['nombre', 'descripcion', 'precio', 'stock','referencia'];
}
