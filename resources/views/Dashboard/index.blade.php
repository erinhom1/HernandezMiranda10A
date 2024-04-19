@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="mt-4">Estacionamientos</h1>
@stop

@section('content')
    {{-- <ol class="breadcrumb mb-4"
        <li class="breadcrumb-item active">Dashboard</li>
    </ol> --}}
    <hr>

 
<div class="row">
@foreach ($estacionamiento as $estacionamientos)
    <div class="col-md-3 grid-margin">
        <div class="card card-body bg-primary text-white mb-3">
            <label>Espacios disponibles en estacionamieto <b>{{$estacionamientos->NumEstacionamiento}}</b></label>
            <div class="d-flex justify-content-center align-items-center">
                <h1>{{$estacionamientos->Disponibilidad}}</h1>
            </div>
            <form method="POST" action="{{ route('estacionamiento.update', $estacionamientos->NumEstacionamiento) }}">
                @csrf
                @method('PUT')
                <button type="submit" class="btn btn-light text-black mt-3">Marcar salida</button>
            </form>
        </div>
    </div>
@endforeach
</div>



   
@stop



@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop