<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estacionamiento extends Model
{

    use HasFactory;
    protected $table = "estacionamientos";
    public $timestamps = false;
    protected $primaryKey = 'NumEstacionamiento';
    protected $fillable=[
        'NumEstacionamiento',
        'Disponibilidad'  
    ];
}

