<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\admin\carreras;
use App\Models\admin\automoviles;


class alumno extends Model
{
    use HasFactory;
    protected $table = "alumno";
    public $timestamps = false;
    protected $primaryKey = 'Matricula';
    protected $fillable=[
        'Matricula',
        'Nombre',
        'Primer_apellido',
        'Segundo_apellido',
        'Turno',
        'Discapacidad',
        'Carrera',
        'Estacionamiento',
        'email',
        'password'    
    ];

    /**
     * Get the formatted value of the Matricula attribute.
     *
     * @param  string  $value
     * @return string
     */
    public function getMatriculaAttribute($value)
    {
        return sprintf('%010d', $value);
    }
    /**
     * Set the Matricula attribute.
     *
     * @param  string  $value
     * @return void
     */
    public function setMatriculaAttribute($value)
    {
        $this->attributes['Matricula'] = str_pad($value, 10, '0', STR_PAD_LEFT);
    }

    public function carrera()
        {
            return $this->belongsTo(Carreras::class, 'Carrera', 'ID_carrera');
        }

        public function automoviles()
        {
            return $this->belongsTo(automoviles::class, 'Alumno', 'NumSerie');
        }
}
