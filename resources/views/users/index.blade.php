@extends('adminlte::page')

@section('title', 'Alumnos')

@section('content_header')
    <h1>Alumnos</h1>
@stop

@section('content')
<div class="card-reader">
 @if(session('mensaje'))
        <div class="alert alert-success">
            {{session('mensaje')}}</strong>
        </div>
    @endif
    <a href="{{route('users.create')}}" class="btn btn-primary">Alumno nuevo</a>
</div>
    <p></p>
    <div class="card">
        <div class="card-body">
            <table id="Alumnos" class="table table-striped shadow-lg mt-4">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>Matricula</th>
                        <th>Nombre</th>
                        <th>Apellido paterno</th>
                        <th>Apellido materno</th>
                        <th>Turno</th>
                        <th>Carrera</th>
                        <th>Acciones</th>
                        <th></th>
                        <th></th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($alumnos as $alumno) 
                        <tr>
                            <td>{{$alumno->Matricula}}</td>
                            <td>{{$alumno->Nombre}}</td>
                            <td>{{$alumno->Primer_apellido}}</td>
                            <td>{{$alumno->Segundo_apellido}}</td>
                            <td width="100px" style="text-align: left">{{$alumno->Turno}}</td>
                            <td>{{$alumno->carrera->Nombre}}</td>
                            <td width="15px"><a href="{{route('users.show', $alumno)}}" class="btn btn-info btn-sm">Ver</a></td>
                            <td width="15px"><a href="{{route('users.edit', $alumno)}}" class="btn btn-primary btn-sm">Editar</a></td>
                            <td width="15px">
                                <form  action="{{route('users.destroy', $alumno)}}" method="POST">
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit" value="Eliminar" class="btn btn-danger btn-sm">
                                </form> 
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>

@stop

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
@endsection

@section('js')

    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <script>
       new DataTable('#Alumnos', {
    language: {
        info: 'Mostrando pagina _PAGE_ de _PAGES_',
        "search": "Buscar",
        infoEmpty: 'No hay registros disponibles',
        infoFiltered: '(filtered from _MAX_ total records)',
        lengthMenu: 'Mostrar _MENU_ registros por pagina',
        zeroRecords: 'No hay registros disponibles',
        "paginate":     {
            "previous":"Anterior",
            "next":"Siguiente",
            "first":"Primero",
            "last":"Ultimo",
        }
    }
});
           
    </script>
@endsection