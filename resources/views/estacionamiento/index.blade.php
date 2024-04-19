@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1 class="mt-4">Estacionamientos</h1>
@stop

@section('content')
    @if(session('error'))
        <div class="alert alert-danger">
            {{session('error')}}
        </div>
    @endif
    <hr>

    <div class="row">
        <div class="col-md-6"> <!-- Left column (Top Left) -->
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    Ultimo alumno registrado
                    <a href="{{ route('users.edit', $latestAlumno) }}" class="btn btn-primary btn-sm ml-auto">Editar</a>
                </div>
                <div class="card-body">
                    @if ($latestAlumno)
                        <p><strong>Matricula:</strong> {{$latestAlumno->Matricula}}</p>
                        <p><strong>Nombre:</strong> {{$latestAlumno->Nombre}}</p>
                        <p><strong>Apellido Paterno:</strong> {{$latestAlumno->Primer_apellido}}</p>
                        <p><strong>Apellido Materno:</strong> {{$latestAlumno->Segundo_apellido}}</p>
                        <p><strong>Turno:</strong> {{$latestAlumno->Turno}}</p>
                        <p><strong>Carrera:</strong> {{$latestAlumno->carrera->Nombre}}</p>
                    @else
                        <p>No existe el alumno.</p>
                    @endif
                </div>
                <div class="card-header d-flex justify-content-between align-items-center">
                    Automovil del alumno
                    @if ($automovil)
                    <a href="{{ route('automoviles.edit', $automovil) }}" class="btn btn-primary btn-sm ml-auto">Editar</a>
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
                        <form method="POST" action="{{ route('estacionamiento.restar', ['NumEstacionamientoMenos' => $automovil->Estacionamiento]) }}">
                            @csrf
                            <button type="submit" class="btn btn-light text-dark mt-3 w-100" >Autorizar acceso</button>
                        </form>
                    @else
                        <p>Este alumno no tiene automovil registrado.</p> <a href="{{route('automoviles.create')}}" style="background-color: purple; color: white;" class="btn btn-primary btn-sm">Registrar auto</a>
                    @endif
                </div>
            </div>    
        </div>
        <div class="col-md-6"> <!-- Right column (Top Right) -->
            <div class="row">
                @foreach ($estacionamiento as $estacionamientos)
                    <div class="col-md-6 grid-margin">
                        <div class="card card-body text-white mb-3 estacionamiento-card">
                            <label>Espacios disponibles en estacionamieto <b class="font-weight-bold">{{$estacionamientos->NumEstacionamiento}}</b></label>
                            <div class="d-flex justify-content-center align-items-center">
                                <h1 class="disponibilidad">{{$estacionamientos->Disponibilidad}}</h1>
                            </div>
                            <form method="POST" action="{{ route('estacionamiento.update', $estacionamientos->NumEstacionamiento) }}" >
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-light text-dark mt-3 w-100" >Marcar salida</button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        </div>
    </div>
@stop


@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop



@section('js')
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const cards = document.querySelectorAll(".estacionamiento-card");

        cards.forEach(card => {
            const disponibilidad = parseInt(card.querySelector(".disponibilidad").textContent);
            const color = getColorByDisponibilidad(disponibilidad);
            card.style.backgroundColor = color;
        });

        function getColorByDisponibilidad(disponibilidad) {
            const red = Math.min(200, Math.round(255 - (255 * disponibilidad) / 50));
            const green = Math.min(180, Math.round((255 * disponibilidad) / 50));
            const blue = 0;
            return `rgb(${red}, ${green}, ${blue})`;
        }
    });
</script>
<script src="./sw.js"></script>


@stop