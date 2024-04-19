<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\marca;
use App\Models\Admin\alumno;



class automoviles extends Model
{
    use HasFactory;
    protected $table = "automoviles";
    public $timestamps = false;
    protected $primaryKey = 'NumSerie';
    protected $keyType = 'string'; 
    protected $fillable=[
        'NumSerie',
        'NumPlaca',
        'Temporada',
        'color',
        'Alumno',
        'Modelo',
        'Marca',
        'Estacionamiento' 
    ];

    public function marca()
    {
        return $this->belongsTo(marca::class, 'Marca', 'Codigo');
    }
    public function alumno()
    {
        return $this->belongsTo(alumno::class, 'Alumno', 'Matricula');
    }
}
