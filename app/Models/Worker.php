<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;

    protected $table = 'workers'; // Especifica el nombre de la tabla si no sigue la convención de nombres

    protected $fillable = [
        'firstname',
        'lastname',
        'identification',
        'identification_type',
        'area_department',
        'position',
        'contact',
        'email',
        'age',
        'address'
    ]; // Especifica los campos que se pueden asignar masivamente

    // Aquí puedes agregar relaciones, accesorios, mutadores y otros métodos personalizados del modelo
}
