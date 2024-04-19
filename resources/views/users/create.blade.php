@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Registrar a un nuevo alumno</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::open(['route' => 'users.store']) !!}
                <div class="form-group">
                    {!! Form::label('Matricula', 'Matricula') !!}
                    {!! Form::number('Matricula', null, ['class' => 'form-control', 'max' => '9999999999', 'required']) !!}
                    @error('Matricula')
                        <span class="text-danger">{{ $message }}</span> 
                    @enderror
                </div>
                <div class="form-group">
                    {!! Form::label('Nombre', 'Nombre') !!}
                    {!! Form::text('Nombre', null, ['class' => 'form-control', 'required']) !!}
                </div>
                @error('Nombre')
                    <span class="text-danger">{{ $message }}</span> 
                @enderror
                <div class="form-group">
                    {!! Form::label('Primer_apellido', 'Apellido paterno') !!}
                    {!! Form::text('Primer_apellido', null, ['class' => 'form-control', 'required']) !!}
                </div>
                @error('Primer_apellido')
                    <span class="text-danger">{{ $message }}</span> 
                @enderror
                <div class="form-group">
                    {!! Form::label('Segundo_apellido', 'Apellido materno') !!}
                    {!! Form::text('Segundo_apellido', null, ['class' => 'form-control', 'required']) !!}
                </div>
                @error('Segundo_apellido')
                    <span class="text-danger">{{ $message }}</span> 
                @enderror
                <div class="form-group">
                    {!! Form::label('Turno', 'Turno') !!}
                    {!! Form::select('Turno', ['Vespertino' => 'Vespertino', 'Matutino' => 'Matutino'], null, ['class' => 'form-control', 'placeholder' => 'Seleccionar...' , 'required']) !!}
                </div>
                @error('Turno')
                    <span class="text-danger">{{ $message }}</span> 
                @enderror
                <div class="form-group">
                    {!! Form::label('Discapacidad', 'Discapacidad') !!}
                    {!! Form::checkbox('Discapacidad', 'Si', false, ['class' => 'form-btn']) !!}
                    {!! Form::checkbox('Discapacidad', 'No', true, ['hidden']) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('Carrera', 'Carrera') !!}
                    {!! Form::select('Carrera', [
                        '1' => 'Tecnologia Ambiental',
                        '2' => 'Energias Renovables',
                        '3' => 'Manufactura Aeronautica',
                        '4' => 'Mecatronica',
                        '5' => 'Entornos Virtuales y Negocios Digitales',
                        '6' => 'Desarrollo y Gestion de Software',
                        '7' => 'Redes Inteligentes y Ciberseguridad',
                        '8' => 'Procesos y Operaciones Industriales',
                        '9' => 'Electromecanica Industrial',
                        '10' => 'Logistica Comercial Global',
                        '11' => 'Contaduria',
                        '12' => 'Gestion de Redes Logisticas',
                        '13' => 'Innovacion de Negocios y Mercadotecnia',
                    ], null, ['class' => 'form-control', 'placeholder' => 'Seleccionar...', 'required']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('automovil[Marca]', 'Marca del automóvil') !!}
                    {!! Form::select('automovil[Marca]', [
                        'AUD89' => 'AUDI',
                        'BMW74' => 'BMW',
                        'CHE87' => 'CHEVROLET',
                        // ... (other options)
                    ], null, ['class' => 'form-control', 'placeholder' => 'Selecciona una marca', 'required']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('automovil[Modelo]', 'Modelo del automóvil') !!}
                    {!! Form::text('automovil[Modelo]', null, ['class' => 'form-control', 'required']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('automovil[NumSerie]', 'Número de Serie') !!}
                    {!! Form::text('automovil[NumSerie]', null, ['class' => 'form-control', 'required']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('automovil[NumPlaca]', 'Número de Placa') !!}
                    {!! Form::text('automovil[NumPlaca]', null, ['class' => 'form-control', 'required']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('Temporada', 'Año') !!}
                    {!! Form::selectRange('Temporada', date('Y') - 40, date('Y'), old('Temporada'), ['class' => 'form-control', 'placeholder' => __('Seleccionar...')]) !!}
                    @error('Temporada')
                    <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    {!! Form::label('automovil[color]', 'Color del automóvil') !!}
                    {!! Form::text('automovil[color]', null, ['class' => 'form-control', 'required']) !!}
                </div>

                <div class="form-group">
                    {!! Form::label('automovil[Estacionamiento]', 'Estacionamiento') !!}
                    {!! Form::select('automovil[Estacionamiento]', [
                        '1' => '1',
                        '2' => '2',
                        '3' => '3',
                        // ... (other options)
                    ], null, ['class' => 'form-control', 'placeholder' => 'Selecciona un estacionamiento', 'required']) !!}
                </div>
                @error('Carrera')
                    <span class="text-danger">{{ $message }}</span> 
                @enderror
                
                {!! Form::submit('Registrar', ['class' => 'btn btn-primary', 'required']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@stop

