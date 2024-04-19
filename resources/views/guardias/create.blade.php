@extends('adminlte::page')

@section('title', 'Nuevo Guardia')

@section('content_header')
    <h1>Registrar a un nuevo guardia</h1>
@stop

@section('content')
<div class="card">
        <div class="card-body">
        {!! Form::open(['route'=>'guardias.store']) !!}
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
                {!! Form::label('role', 'Guardia:')!!}
                {!! Form::radio('Role', '1', false, ['class'=>'form-btn']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('role', 'Admin:')!!}
                {!! Form::radio('Role', '2', false, ['class'=>'form-btn']) !!}
            </div>
                {!! Form::submit('Registrar',['class'=>'btn btn-primary']) !!}

        {!! Form::close() !!}
        </div>
    </div>
        
@stop
