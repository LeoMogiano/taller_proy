@extends('adminlte::page')

@section('title', 'Smartplusshouse')

@section('content_header')
    <h1>Editar datos de Medico</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form method="post" action="{{ route('medicos.update', $medico) }}">
                @csrf
                @method('PATCH')

                <div class="row" >
                    <div class="col-md-6">
                        <label for="nombre">Nombre Completo</label>
                        <input type="text" name="nombre" class="form-control" value="{{ $medico->nombre }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="edad">Edad</label>
                        <input type="number" name="edad" class="form-control" value="{{ $medico->edad }}" required>
                    </div>
                </div>


                <div class="row" style="padding-top: 10px">
                    <div class="col-md-6">
                        <label for="sexo">Género</label>
                        <select name="sexo" class="focus border-primary  form-control">
                            @if ($medico->sexo == 'Masculino')
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                            @else
                                <option value="Femenino">Femenino</option>
                                <option value="Masculino">Masculino</option>
                            @endif

                        </select>
                    </div>
                    <div class="col-md-6" >
                        <label for="telefono">Número de Teléfono</label>
                        <input type="number" name="telefono" class="form-control" value="{{ $medico->telefono }}" required>
                    </div>
                </div>



                <div class="row" style="padding-top: 10px">
                    <div class="col-md-6">
                        <label for="direccion">Dirección de Domicilio</label>
                        <input type="text" name="direccion" class="form-control" value="{{ $medico->direccion }}"
                            required>
                    </div>

                    <div class="col-md-6">
                        <label for="direccion">Especialidad</label>
                        <input type="text" name="especialidad" class="form-control" value="{{ $medico->especialidad }}"
                            required>
                    </div>
                </div>
                <br>
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a class="btn btn-danger" href="{{ route('medicos.index') }}">Volver</a>

            </form>

        </div>
    </div>
@stop
@section('css')
    <link rel="shortcut icon" href="{{ asset('img/logo.jpg') }}" type="image/x-icon">
@stop
