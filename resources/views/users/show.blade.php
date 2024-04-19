@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Detalle de alumno</h1>
    <a href="{{ url()->previous() }}" class="btn btn-secondary ">Volver</a>
@stop

@section('content')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title">Información del Alumno</h3>
                <a href="{{ route('users.edit', $dataAlumno) }}" class="btn btn-primary btn-sm ml-auto">Editar</a>
            </div>
            <div class="card-body">
                @if(isset($dataAlumno))
                <div class="card-body">
                    <p><strong>Matricula:</strong> {{ $dataAlumno->Matricula }}</p>
                    <p><strong>Nombre:</strong> {{ $dataAlumno->Nombre }} {{ $dataAlumno->Primer_apellido }} {{ $dataAlumno->Segundo_apellido }}</p>
                    <p><strong>Carrera:</strong> {{ $dataAlumno->carrera->Nombre }}</p>
                    <p><strong>Turno:</strong> {{ $dataAlumno->Turno }}</p>
                    <p><strong>Discapacidad:</strong> {{ $dataAlumno->Discapacidad }}</p>
                    <p><strong>Email:</strong> {{ $dataAlumno->Email }}</p>
                </div>
                @else
                <p>Selecciona un alumno para ver los detalles.</p>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h3 class="card-title">Información del Vehiculo</h3>
                 @if ($automovil)
                <a href="{{ route('automoviles.edit', $automovil->NumSerie) }}" class="btn btn-primary btn-sm ml-auto">Editar</a>
                @endif
            </div>
            <div class="card-body">
                @if ($automovil)
                    <p><strong>Numero de serie:</strong> {{$automovil->NumSerie}}</p>
                    <p><strong>Numero de placa:</strong> {{$automovil->NumPlaca}}</p>
                    <p><strong>Año:</strong> {{$automovil->Temporada}}</p>
                    <p><strong>Color:</strong> {{$automovil->Color}}</p>
                    <p><strong>Modelo:</strong> {{$automovil->Modelo}}</p>
                    <p><strong>Marca:</strong> {{$automovil->marca->Nombre}}</p>
                    <p><strong>Estacionamiento:</strong> {{$automovil->Estacionamiento}}</p>
                @else
                    <p>Este alumno no tiene automovil registrado.</p> <a href="{{route('automoviles.create' ,$dataAlumno->Matricula)}}" style="background-color: purple; color: white;" class="btn btn-primary btn-sm">Registrar auto</a>
                @endif
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop