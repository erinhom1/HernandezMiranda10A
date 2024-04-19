@extends('adminlte::page')

@section('title', 'Editar guardia')

@section('content_header')

    <h1>Editar Guardia: <b>{{ $guardia->Nombre}} {{$guardia->Primer_apellido}} {{$guardia->Segundo_apellido}}</b></h1>

    
@stop

@section('content')
<div class="card">
        <div class="card-body">
        {!! Form::model($guardia, ['route'=>['guardias.update', $guardia->ID_guardia], 'method'=>'put']) !!}
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
                {!! Form::submit('Actualizar',['class'=>'btn btn-primary']) !!}
                <a href="{{ url()->previous() }}" class="btn btn-secondary ml-3">Cancelar</a>


        {!! Form::close() !!}
        </div>
    </div>
        
@stop