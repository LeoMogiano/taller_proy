@extends('adminlte::page')

@section('title', 'Smartplusshouse')

@section('content_header')
    <h1>Actualizar Paciente</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('pacientes.update', $paciente) }}">
                @csrf
                @method('PATCH')


                <div class="row">
                    <div class="col-md">
                        <label for="nombre">Nombre Completo</label>
                        <input type="text" name="nombre" class="form-control" value="{{ $paciente->nombre }}" required>

                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <label for="ci">Carnet de Identidad</label>
                        <input type="text" name="ci" class="form-control" value="{{ $paciente->ci }}" required>
                    </div>
                    <div class="col-md-4">
                        <label for="edad">Edad</label>
                        <input type="number" name="edad" class="form-control" value="{{ $paciente->edad }}" required>
                    </div>
                    <div class="col-md-4">
                        <label for="sexo">Genero</label>
                        <select name="sexo" class="focus border-primary  form-control">
                            @if ($paciente->sexo == 'Masculino')
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                            @else
                                <option value="Femenino">Femenino</option>
                                <option value="Masculino">Masculino</option>
                            @endif

                        </select>
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-6">
                        <label for="direccion">Dirección de Domicilio</label>
                        <input type="text" name="direccion" class="form-control" value="{{ $paciente->direccion }}"
                            required>
                    </div>
                    <div class="col-md-6">
                        <label for="telefono">Número Telefono</label>
                        <input type="number" name="telefono" class="form-control" value="{{ $paciente->telefono }}"
                            required>
                    </div>
                </div>
                <br>

                <button type="submit" class="btn btn-primary">Actualizar Paciente</button>
                <a class="btn btn-danger" href="{{ route('pacientes.index') }}">Volver</a>

            </form>

        </div>
    </div>
    
@stop

@section('css')
    <link rel="shortcut icon" href="{{ asset('img/logo.jpg') }}" type="image/x-icon">
@stop
