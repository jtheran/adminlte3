<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Children extends Model
{
    use HasFactory;

    protected $table = 'children'; // Especifica el nombre de la tabla si no sigue la convención de nombres

    protected $fillable = [
        'firstname',
        'lastname',
        'identification',
        'identification_type',
        'eps',
        'address',
        'age'
    ]; // Especifica los campos que se pueden asignar masivamente

    // Aquí puedes agregar relaciones, accesorios, mutadores y otros métodos personalizados del modelo
}
