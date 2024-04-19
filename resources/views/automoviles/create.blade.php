@extends('adminlte::page')

@section('title', 'Nuevo Automovil')

@section('content_header')
    <h1>Registrar un nuevo automovil</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
            {!! Form::model($alumno, ['route' => ['automoviles.store', $automovilData->NumSerie], 'method' => 'put']) !!}
            <div class="form-group">
                {!! Form::label('Matricula', 'Matricula') !!}
                {!! Form::number('Matricula', $alumno->Matricula, ['class' => 'form-control', 'readonly']) !!}
            </div>
            {!! Form::close() !!}
    
        {!! Form::open(['route' => 'automoviles.store']) !!}
        <div class="form-group">
            {!! Form::label('NumSerie', 'Numero de serie') !!}
            {!! Form::number('NumSerie', null, ['class' => 'form-control', 'max' => '999']) !!}
        </div>
        @error('NumSerie')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        <div class="form-group">
            {!! Form::label('NumPlaca', 'Numero de placa') !!}
            {!! Form::text('NumPlaca', null, ['class' => 'form-control']) !!}
        </div>
        @error('NumPlaca')
        <span class="text-danger">{{ $message }}</span>
        @enderror
        <div class="form-group">
            <x-label for="Marca" value="{{ __('Marca') }}" />
            {!! Form::select('automovil[Marca]', [
                '' => __('Selecciona una marca'),
                'AUD89' => 'AUDI',
                'BMW74' => 'BMW',
                // ... add the remaining options
                'VOL22' => 'VOLVO',
            ], old('automovil.Marca'), ['class' => 'form-control', 'placeholder' => __('Seleccionar...')]) !!}
            @error('automovil.Marca')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            {!! Form::label('Temporada', 'Año') !!}
            {!! Form::selectRange('Temporada', date('Y') - 40, date('Y'), old('Temporada'), ['class' => 'form-control', 'placeholder' => __('Seleccionar...')]) !!}
            @error('Temporada')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
            {!! Form::label('Modelo', 'Modelo') !!}
            {!! Form::text('Modelo', null, ['class' => 'form-control']) !!}
            @error('Modelo')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    {!! Form::submit('Registrar', ['class' => 'btn btn-primary']) !!}
    {!! Form::close() !!}
</div>
@stop