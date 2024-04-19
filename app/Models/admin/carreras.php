<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class carreras extends Model
{
    protected $primaryKey = 'ID_carrera';
    public function alumno()
    {
        return $this->hasMany(alumno::class, 'Carrera', 'Matricula');
    }
}
