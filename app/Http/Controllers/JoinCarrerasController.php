<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin\carreras;
use App\Models\admin\alumno;


class JoinCarrerasController extends Controller
{
    public function index()
    {
        $carreraAlumno = carreras::join('alumno', 'carreras.Matricula', '=', 'Matricula')
            ->select('carreras.Nombre')
            ->get();

        return view('users.index', ['carreras' => $carreraAlumno]);
    } 
}
