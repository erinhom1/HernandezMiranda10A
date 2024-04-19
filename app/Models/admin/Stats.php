<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stats extends Model
{
    protected $table = "salidasentradas";
    protected $primaryKey = 'ID';
    public $timestamps = false;

    public function salidasAuto()
    {
        return $this->belongsTo(Automovil::class, 'NumSerie', 'Automovil');
    }
    
}

