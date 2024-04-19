<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\guardias;

class GuardiasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guardia = guardias::all();
        return view('guardias.index',compact('guardia'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('guardias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'Nombre'=>'required',
                'Primer_apellido'=>'required',
                'Segundo_apellido'=>'required',
                'Turno'=>'required'
            ]
            );
        
        $guardia = guardias::create($request->all());
        return redirect()->route('guardias.index')->with('mensaje', 'Guardia Registrado exitosamente.');
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
    public function edit($ID_guardia)
    {
        $guardia = guardias::find($ID_guardia);

        return view('guardias.edit',compact('guardia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $ID_guardia)
    {


        $request->validate(
            [
                'Nombre'=>'required',
                'Primer_apellido'=>'required',
                'Segundo_apellido'=>'required',
                'Turno'=>'required'
            ]
            );
                $guardia= guardias::find($ID_guardia);  
                $guardia->update($request->all());
                return redirect()->route('guardias.index')->with('mensaje', 'Guardia actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($ID_guardia)
    {
        $guardia = guardias::find($ID_guardia);
        $guardia->delete();
        return redirect()->route('guardias.index')->with('mensaje', 'Guardia eliminado exitosamente.');
    }
}
