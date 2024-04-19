@extends('adminlte::page')

@section('title', 'Editar Automovil')

@section('content_header')

    <h1>Editar Automivil de: 
    <b>{{ $alumno->Nombre}} {{$alumno->Primer_apellido}} {{$alumno->Segundo_apellido}}</b>
    </h1>

    
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            {!! Form::model($automovilData, ['route'=>['automoviles.update', $automovilData->NumSerie], 'method'=>'put']) !!}
            <div class="form-group">
                {!! Form::label('NumSerie', 'Numero de serie')!!}
                {!! Form::text('NumSerie', null, ['class' => 'form-control', 'required']) !!}
            </div>
            @error('NumSerie')
                <span class="text-danger">{{ $message }}</span> 
            @enderror
            <div class="form-group">
                {!! Form::label('NumPlaca', 'Numero de placa')!!}
                {!! Form::text('NumPlaca', null, ['class' => 'form-control', 'required']) !!}
            </div>
            @error('NumPlaca')
                <span class="text-danger">{{ $message }}</span> 
            @enderror
            <div class="form-group">
                {!! Form::label('Temporada', 'Año') !!}
                {!! Form::selectRange('Temporada', date('Y') - 40, date('Y'), old('Temporada'), ['class' => 'form-control', 'placeholder' => __('Seleccionar...')]) !!}
            </div>
            @error('Temporada')
                <span class="text-danger">{{ $message }}</span> 
            @enderror
            <div class="form-group">
                {!! Form::label('Color', 'Color')!!}
                {!! Form::text('Color', null, ['class' => 'form-control', 'required']) !!}
            </div>
            @error('Color')
                <span class="text-danger">{{ $message }}</span> 
            @enderror
            <div class="form-group">
                {!! Form::label('Modelo', 'Modelo')!!}
                {!! Form::text('Modelo', null, ['class' => 'form-control', 'required']) !!}
            </div>
            @error('Modelo')
                <span class="text-danger">{{ $message }}</span> 
            @enderror
            <div class="form-group">
                {!! Form::label('automovil.Marca', __('Marca del automóvil')) !!}
                {!! Form::select('Marca', [
                    ''      => __('Selecciona una marca'),
                    'AUD89' => 'AUDI',
                    'BMW74' => 'BMW',
                    'CHE87' => 'CHEVROLET',
                    'FIA47' => 'FIAT',
                    'FOR36' => 'FORD',
                    'HON14' => 'HONDA',
                    'HYU25' => 'HYUNDAI',
                    'INF84' => 'INFINITI',
                    'JEE25' => 'JEEP',
                    'KIA71' => 'KIA',
                    'LEX95' => 'LEXUS',
                    'MAZ27' => 'MAZDA',
                    'MER19' => 'MERCEDES',
                    'MIN36' => 'MINI',
                    'MIT28' => 'MITSUBISHI',
                    'NIS99' => 'NISSAN',
                    'PEU41' => 'PEUGEOT',
                    'REN25' => 'RENAULT',
                    'SEA74' => 'SEAT',
                    'SUB33' => 'SUBARU',
                    'SUZ14' => 'SUZUKI',
                    'TOY36' => 'TOYOTA',
                    'VOK85' => 'VOLKSWAGEN',
                    'VOL22' => 'VOLVO',
                ], $automovilData->Marca, ['class' => 'form-control', 'required']) !!}
            </div>
            @error('automovil.Marca')
                <span class="text-danger">{{ $message }}</span> 
            @enderror
            <div class="form-group">
                {!! Form::label('Estacionamiento', 'Estacionamiento')!!}
                {!! Form::selectRange('Estacionamiento', 1, 5, $automovilData->Estacionamiento, ['class' => 'form-control', 'required']) !!}
            </div>
            @error('Estacionamiento')
                <span class="text-danger">{{ $message }}</span> 
            @enderror
            {!! Form::submit('Actualizar', ['class' => 'btn btn-primary']) !!}
            <a href="{{ url()->previous() }}" class="btn btn-secondary ml-3">Cancelar</a>
            {!! Form::close() !!}
        </div>
    </div>
@stop