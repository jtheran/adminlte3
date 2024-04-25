<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
    use HasFactory;

    protected $table = 'parents'; // Especifica el nombre de la tabla si no sigue la convención de nombres

    protected $fillable = [
        'firstname',
        'lastname',
        'identification',
        'identification_type',
        'eps',
        'address',
        'age',
        'job',
        'position',
        'contact',
        'email'
    ]; // Especifica los campos que se pueden asignar masivamente

    // Aquí puedes agregar relaciones, accesorios, mutadores y otros métodos personalizados del modelo
    public function children()
    {
        return $this->belongsToMany(Children::class);
    }
}
