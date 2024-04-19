<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class guardias extends Model
{
    use HasFactory;
    protected $table = "guardias";
    public $timestamps = false;
    protected $primaryKey = 'ID_guardia';
    protected $fillable=[
        'Nombre',
        'Primer_apellido',
        'Segundo_apellido',
        'Turno',
        'Entrada',
        'Salida'   
    ];
}
