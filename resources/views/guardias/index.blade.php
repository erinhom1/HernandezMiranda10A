@extends('adminlte::page')

@section('title', 'Guardias')

@section('content_header')
    <h1><b>Guardias</b></h1>
@stop

@section('content')
<div class="card-reader">
 @if(session('mensaje'))
        <div class="alert alert-success">
            {{session('mensaje')}}</strong>
        </div>
    @endif
    <a href="{{route('guardias.create')}}" class="btn btn-primary">Guardia nuevo</a>
</div>
<p></p>
    <div class="card">
        <div class="card-body">
            <table id="Guardias" class="table table-striped shadow-lg mt-4">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido paterno</th>
                        <th>Apellido materno</th>
                        <th>Turno</th>
                        <th>Entrada</th>
                        <th>Salida</th>
                        <td></td>
                        <td></td>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($guardia as $guardias) 
                        <tr>
                            <td>{{$guardias->ID_guardia}}</td>
                            <td>{{$guardias->Nombre}}</td>
                            <td>{{$guardias->Primer_apellido}}</td>
                            <td>{{$guardias->Segundo_apellido}}</td>
                            <td width="100px" style="text-align: left">{{$guardias->Turno}}</td>
                            <td>{{$guardias->Entrada}}</td>
                            <td>{{$guardias->Salida}}</td>
                            <td width="15px"><a href="{{route('guardias.edit', $guardias->ID_guardia)}}" class="btn btn-primary btn-sm">Editar</a></td>
                            <td width="15px">
                                <form  action="{{route('guardias.destroy', $guardias->ID_guardia)}}" method="POST">
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
       new DataTable('#Guardias', {
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