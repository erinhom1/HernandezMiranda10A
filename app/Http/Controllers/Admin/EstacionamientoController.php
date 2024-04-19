<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\estacionamiento;
use App\Models\Admin\alumno;
use App\Models\Admin\automoviles;





class EstacionamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $estacionamiento = Estacionamiento::all();
        $latestAlumno = Alumno::orderBy('Matricula', 'desc')->first();

        if ($latestAlumno) {
            $automovil = Automoviles::where('Alumno', $latestAlumno->Matricula)->first();
        } else {
            $automovil = null;
        }

        return view('estacionamiento.index', compact('estacionamiento', 'latestAlumno', 'automovil'));

        
        return data-> json().$estacionamiento;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $NumEstacionamiento)
    {
        $estacionamiento = Estacionamiento::find($NumEstacionamiento);
        $limite = $estacionamiento->Limite;

        if ($estacionamiento->Disponibilidad < $limite) {
            $estacionamiento->update([
                'Disponibilidad' => $estacionamiento->Disponibilidad + 1,
            ]);
            return redirect()->route('estacionamiento.index');
        } else {
            return redirect()->route('estacionamiento.index')->with('error', 'El estacionamiento ya esta vacio.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
    }

    public function restar(Request $request, $NumEstacionamientoMenos)
    {

        $estacionamiento = Estacionamiento::find($NumEstacionamientoMenos);

        if ($estacionamiento->Disponibilidad  > 0) {
            $estacionamiento->update([
                'Disponibilidad' => $estacionamiento->Disponibilidad - 1,
            ]);
            return redirect()->route('estacionamiento.index');
        } else {
            return redirect()->route('estacionamiento.index')->with('error', 'El estacionamiento esta lleno.');
        }
        
    }
}
