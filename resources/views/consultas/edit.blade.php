@extends('adminlte::page')

@section('title', 'PROSALUD+')

@section('content_header')
    <h1>Editar consultas</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            <form action="{{ route('consultas.update', $consulta->id) }}" method="post">
                @csrf
                @method('PATCH')

                <div class="row">
                    <div class="col-md-6">
                        <label for="fecha">Fecha de Consulta</label>
                        <input type="date" name="fecha_consulta" class="form-control" value="{{ $consulta->fecha_consulta }}" required>
                    </div>
                    <div class="col-md-6">
                        <label for="hora">Hora</label>
                        <input type="time" name="hora" class="form-control" value="{{ $consulta->hora }}" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="estado">Médico</label>
                        <select name="doctor_id" class="focus border-primary  form-control">
                            @foreach ($medicos as $medico)
                                @if ($consulta->doctor_id == $medico->id)
                                    <option value="{{ $medico->id }}">{{ $medico->nombre }}</option>
                                @endif
                            @endforeach
                            @foreach ($medicos as $medico)
                                @if (!($consulta->doctor_id == $medico->id))
                                    <option value="{{ $medico->id }}">{{ $medico->nombre }}</option>
                                @endif
                            @endforeach

                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="estado">Paciente</label>
                        <select name="paciente_id" class="focus border-primary  form-control">
                            @foreach ($pacientes as $paciente)
                                @if ($consulta->paciente_id == $paciente->id)
                                    <option value="{{ $paciente->id }}">{{ $paciente->nombre }}</option>
                                @endif
                            @endforeach
                            @foreach ($pacientes as $paciente)
                                @if (!($consulta->paciente_id == $paciente->id))
                                    <option value="{{ $paciente->id }}">{{ $paciente->nombre }}</option>
                                @endif
                            @endforeach

                        </select>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md">
                        <label for="fecha">Descripcion</label>
                        <textarea type="text" name="descripcion" class="form-control" required>{{ $consulta->descripcion }} </textarea>
                    </div>
                </div>

                <br>

                <div class="form-group">
                    <button class="btn btn-primary" type="submit" value="required">Actualizar consulta</button>
                    <a class="btn btn-danger" href="{{ route('consultas.index') }}">Volver</a>
                </div>

            </form>

        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

@stop
