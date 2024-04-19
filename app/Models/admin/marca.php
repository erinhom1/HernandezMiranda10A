<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Admin\automoviles;


class marca extends Model
{
    protected $table = "marca";
    protected $primaryKey = 'Codigo';
    public function automoviles()
    {
        return $this->hasMany(automoviles::class, 'Marca', 'NumSerie');
    }
}
