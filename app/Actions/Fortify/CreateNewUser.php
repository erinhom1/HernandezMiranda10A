<?php

namespace App\Actions\Fortify;

use App\Models\User;
use App\Models\admin\Automoviles;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;


class CreateNewUser implements CreatesNewUsers
{
    
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public $timestamps = false;
    public function create(array $input): User
    {
        
        Validator::make($input, [
            'Matricula' => ['required', 'numeric', 'digits:10'],
            'Nombre' => ['required', 'string', 'max:255'],
            'Primer_apellido' => ['required', 'string', 'max:255'],
            'Segundo_apellido' => ['required', 'string', 'max:255'],
            'Turno' => ['required', 'string', 'max:10'],
            'Discapacidad' => ['string', 'max:2'],
            'Carrera' => ['required', 'string'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            //'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
        ])->validate();

        $user = User::create([
            'Matricula' => $input['Matricula'],
            'Nombre' => $input['Nombre'],
            'Primer_apellido' => $input['Primer_apellido'],
            'Segundo_apellido' => $input['Segundo_apellido'],
            'Turno' => $input['Turno'],
            'Discapacidad' => isset($input['Discapacidad']) ? 'SI' : 'NO',
            'Carrera' => $input['Carrera'],
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'automovil.Marca' => ['required', 'string'],      
            'automovil.Modelo' => ['required', 'string'],    
            'automovil.NumSerie' => ['required', 'string'],   
            'automovil.NumPlaca' => ['required', 'string'], 
            'automovil.Temporada' => ['required', 'numeric'], 
            'automovil.color' => ['required', 'string'],      
            'automovil.Estacionamiento' => ['required', 'numeric'],
        ]);


        if (isset($input['automovil'])) {
            $automovilData = $input['automovil'];
            $automovilData['Alumno'] = $user->Matricula;
        
            Automoviles::create([
                'Marca' => $automovilData['Marca'],
                'Modelo' => $automovilData['Modelo'],
                'NumSerie' => $automovilData['NumSerie'],
                'NumPlaca' => $automovilData['NumPlaca'],
                'Temporada' => $automovilData['Temporada'],
                'color' => $automovilData['color'],
                'Estacionamiento' => $automovilData['Estacionamiento'],
                'Alumno' => $automovilData['Alumno'],
            ]);
        }

        return $user;

    }
}
