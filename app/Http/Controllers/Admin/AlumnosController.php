<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\alumno;
use App\Models\admin\carreras;
use App\Models\admin\automoviles;



class AlumnosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() //leer todos los registros 
    {
        $alumnos = alumno::all();
        return view('users.index',compact('alumnos'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() // nuevo registro
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) // para guardar en DB 
    {
        
        $request->validate(
            [
                'Matricula'=>'required',
                'Nombre'=>'required',
                'Primer_apellido'=>'required',
                'Segundo_apellido'=>'required',
                'Turno'=>'required',
                'Carrera'=>'required',   
            ]
            );

        $alumno = Alumno::create($request->all());
        return redirect()->route('users.index')->with('mensaje', 'Alumno Registrado exitosamente.');
        // $user = alumno::create([
        //     'Matricula' => $request['Matricula'],
        //     'Nombre' => $request['Nombre'],
        //     'Primer_apellido' => $request['Primer_apellido'],
        //     'Segundo_apellido' => $request['Segundo_apellido'],
        //     'Turno' => $request['Turno'],
        //     'Discapacidad' => isset($input['Discapacidad']) ? 'SI' : 'NO',
        //     'Carrera' => $request['Carrera'],
        //     'email' => $request['email'],
        //     //'password' => Hash::make($request['password']),
        //     'automovil.Marca' => ['required', 'string'],      
        //     'automovil.Modelo' => ['required', 'string'],    
        //     'automovil.NumSerie' => ['required', 'string'],   
        //     'automovil.NumPlaca' => ['required', 'string'], 
        //     'automovil.Temporada' => ['required', 'numeric'], 
        //     'automovil.color' => ['required', 'string'],      
        //     'automovil.Estacionamiento' => ['required', 'numeric'],
        // ]);


        // if (isset($request['automovil'])) {
        //     $automovilData = $request['automovil'];
        //     $automovilData['Alumno'] = $user->Matricula;
        
        //     Automoviles::create([
        //         'Marca' => $automovilData['Marca'],
        //         'Modelo' => $automovilData['Modelo'],
        //         'NumSerie' => $automovilData['NumSerie'],
        //         'NumPlaca' => $automovilData['NumPlaca'],
        //         'Temporada' => $automovilData['Temporada'],
        //         'color' => $automovilData['color'],
        //         'Estacionamiento' => $automovilData['Estacionamiento'],
        //         'Alumno' => $automovilData['Alumno'],
        //     ]);
    
    //}
}

    /**
     * Display the specified resource.
     */
    public function show($alumno) // para visualizar un solo registro a detalle
    {   
        $dataAlumno = alumno::find($alumno);
        
        if ($dataAlumno) {
            $automovil = Automoviles::where('Alumno', $dataAlumno->Matricula)->first();
            return view('users.show', compact('dataAlumno', 'automovil'));
        } else {
            return view('users.show', compact('dataAlumno'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($Matricula) // para modificar un formulario existente 
    {

        $alumno = alumno::find($Matricula);
        return view('users.edit',compact('alumno'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $Matricula) //para actulizar la info de un registro
    {
            
            $request->validate(
                [
                    'Matricula'=>'required',
                    'Nombre'=>'required',
                    'Primer_apellido'=>'required',
                    'Segundo_apellido'=>'required',
                    'Turno'=>'required',
                    'Carrera'=>'required',   
                ]
                );
    
                    $alumno = alumno::find($Matricula);
                    $alumno->update($request->all());
                    return redirect()->route('users.index')->with('mensaje', 'Alumno actualizado exitosamente.');
        

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($Matricula) //para eliminar un registro
    {
        
        $alumno = alumno::find($Matricula);
        $carro = automoviles::where('Alumno', $Matricula)->first();
        $carro->delete();
        $alumno->delete();
        return redirect()->route('users.index')->with('mensaje', 'Alumno eliminado exitosamente.');
    }
}
