@extends('adminlte::page')

@section('title', 'Autmoviles')

@section('content_header')
    <h1><b>Autmoviles</b></h1>
@stop

@section('content')
<div class="card-reader">
 @if(session('mensaje'))
        <div class="alert alert-success">
            {{session('mensaje')}}</strong>
        </div>
    @endif
</div>
<p></p>
    <div class="card">
        <div class="card-body">
            <table id="Autos" class="table table-striped shadow-lg mt-4">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>numero de placa</th>
                        <th>Marca</th>
                        <th>Modelo</th>
                        <th>Año</th>
                        <th>Color</th>
                        <th>Numero de serie</th>
                        <th>Estacionamiento</th>
                        <th>Dueño</th>
                        <th></th>
                        <th></th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($auto as $autos) 
                        <tr>
                            <td>{{$autos->NumPlaca}}</td>
                            <td>{{$autos->marca->Nombre}}</td>
                            <td>{{$autos->Modelo}}</td>
                            <td>{{$autos->Temporada}}</td>
                            <td width="100px" style="text-align: left">{{$autos->Color}}</td>
                            <td>{{$autos->NumSerie}}</td>
                            <td>{{$autos->Estacionamiento}}</td>
                            <td>{{$autos->alumno->Nombre }} {{$autos->alumno->Primer_apellido}} {{$autos->alumno->Segundo_apellido}}</td>
                            <td width="15px"><a href="{{route('automoviles.edit', $autos->NumSerie)}}" class="btn btn-primary btn-sm">Editar</a></td>
                            <td width="15px">
                                <form  action="{{route('automoviles.destroy', $autos->NumSerie)}}" method="POST">
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
       new DataTable('#Autos', {
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