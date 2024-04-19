<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\automoviles;
use App\Models\Admin\marca;
use App\Models\Admin\estacionamiento;
use App\Models\Admin\alumno;


class AutomovilesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $auto = automoviles::all();
        return view('automoviles.index',compact('auto'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(alumno $alumnoId)
    {
        $alumno = Alumno::findOrFail($alumnoId);
        return view('automoviles.create', compact('alumno'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $automovil)
    {   
        
        $automovilData = Automoviles::findOrFail($automovil);
        $alumno = $automovilData->alumno;
        return view('automoviles.edit', compact('automovilData', 'alumno'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $NumSerie)
    {

                $carro = Automoviles::findOrFail($NumSerie);
                $carro->update($request->all());
                return redirect()->route('automoviles.index')->with('mensaje', 'Automovil actualizado exitosamente.');
                
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($auto)
    {
        $carro = automoviles::find($auto);
        $carro->delete();
        return redirect()->route('automoviles.index')->with('mensaje', 'Automovil eliminado exitosamente.');
    }

    public function restar(estacionamiento $Estacionamiento)
    {
        

        $Estacionamiento = estacionamiento::where('NumEstacionamiento', $Estacionamiento->NumEstacionamiento);

        dd($Estacionamiento);
        if ($Estacionamiento && $Estacionamiento->Disponibilidad > 0) {
 
            return redirect()->route('estacionamiento.index')->with('error', 'si');
            

         }

        
    }
    
}
