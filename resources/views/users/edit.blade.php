@extends('adminlte::page')

@section('title', 'Editar alumno')

@section('content_header')

    <h1>Editar alumno: <b>{{ $alumno->Nombre}} {{$alumno->Primer_apellido}} {{$alumno->Segundo_apellido}}</b></h1>

    
@stop

@section('content')
<div class="card">
        <div class="card-body">
        {!! Form::model($alumno, ['route'=>['users.update', $alumno->Matricula], 'method'=>'put']) !!}
            <div class="form-group">
                {!! Form::label('Matricula', 'Matricula')!!}
                {!! Form::number('Matricula',null, ['class'=>'form-control', 'readonly']) !!}
                @error('Matricula')
                    <span class="text-danger">{{$message}}</span> 
                @enderror
            </div>
            <div class="form-group">
                {!! Form::label('Nombre', 'Nombre')!!}
                {!! Form::text('Nombre',null, ['class'=>'form-control']) !!}
            </div>
            @error('Nombre')
                    <span class="text-danger">{{$message}}</span> 
                @enderror
            <div class="form-group">
                {!! Form::label('Primer_apellido', 'Apellido paterno')!!}
                {!! Form::text('Primer_apellido',null, ['class'=>'form-control']) !!}
            </div>
            @error('Primer_apellido')
                    <span class="text-danger">{{$message}}</span> 
                @enderror
            <div class="form-group">
                {!! Form::label('Segundo_apellido', 'Apellido materno')!!}
                {!! Form::text('Segundo_apellido',null, ['class'=>'form-control']) !!}
            </div>
            @error('Segundo_apellido')
                    <span class="text-danger">{{$message}}</span> 
                @enderror
            <div class="form-group">
                {!! Form::label('Turno', 'Turno')!!}
                {!! Form::select('Turno', ['Vespertino'=>'Vespertino', 'Matutino'=>'Matutino'], null, ['class'=>'form-control', 'placeholder'=>'Seleccionar...']) !!}
            </div>
            @error('Turno')
                    <span class="text-danger">{{$message}}</span> 
                @enderror
            <div class="form-group">
                {!! Form::label('Discapacidad', 'Discapacidad')!!}
                {!! Form::checkbox('Discapacidad', 'Si', false, ['class'=>'form-btn']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('Carrera', 'Carrera')!!}
                {!! Form::select('Carrera',[
                    '1'=>'Tecnologia Ambiental',
                    '2'=>'Energias Renovables',
                    '3'=>'Manufactura Aeronautica',
                    '4'=>'Mecatronica',
                    '5'=>'Entornos Virtuales y Negocios Digitales',
                    '6'=>'Desarrollo y Gestion de Software',
                    '7'=>'Redes Inteligentes y Ciberseguridad',
                    '8'=>'Procesos y Operaciones Industriales',
                    '9'=>'Electromecanica Industrial',
                    '10'=>'Logistica Comercial Global',
                    '11'=>'Contaduria',
                    '12'=>'Gestion de Redes Logisticas',
                    '13'=>'Innovacion de Negocios y Mercadotecnia',
                    ], null, ['class'=>'form-control', 'placeholder'=>'Seleccionar...']) !!}
            </div>
            @error('Carrera')
                    <span class="text-danger">{{$message}}</span> 
                @enderror
                {!! Form::submit('Actualizar',['class'=>'btn btn-primary']) !!}
                
                <a href="{{ url()->previous() }}" class="btn btn-secondary ml-3">Cancelar</a>

        {!! Form::close() !!}

        

        </div>
    </div>
        
@stop
