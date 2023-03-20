@extends('adminlte::page')

@section('title', 'PROSALUD+')

@section('content_header')
    <h1>Registrar Paciente</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            <form action="{{ route('pacientes.store') }}" method="post">
                @csrf

                <div class="row">
                    <div class="col-md">
                        <label for="nombre">Nombre Completo</label>
                        <input type="text" name="nombre" class="form-control" value="" required>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-4">
                        <label for="ci">Carnet de Identidad</label>
                        <input type="text" name="ci" class="form-control" value="" required>
                    </div>
                    <div class="col-md-4">
                        <label for="edad">Edad</label>
                        <input type="number" name="edad" class="form-control" value="" required>
                    </div>
                    <div class="col-md-4">
                        <label for="sexo">Genero</label>
                        <select name="sexo" class="focus border-primary  form-control">
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                        </select>
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-6">
                        <label for="telefono">Numero de Telefono</label>
                        <input type="number" name="telefono" class="form-control" value="" required>
                    </div>
                    <div class="col-md-6">
                        <label for="direccion">Dirección de Domicilio</label>
                        <input type="text" name="direccion" class="form-control" value="" required>
                    </div>
                </div>

                <br>

                <div class="row">
                    <div class="col-md-6">
                        <label for="correo">Correo Electornico</label>
                        <input type="email" name="email" class="form-control" value="" required>
                    </div>
                    <div class="col-md-6">
                        <label for="password">Contraseña</label>
                        <input type="text" name="password" class="form-control" value="" required>
                    </div>
                </div>

                <br>

                <div class="form-group">
                    <button class="btn btn-primary" type="submit" value="required">Añadir Paciente</button>
                    <a class="btn btn-danger" href="{{ route('pacientes.index') }}">Volver</a>
                </div>

            </form>

        </div>
    </div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="shortcut icon" href="{{ asset('img/logo.jpg') }}" type="image/x-icon">
@stop

@section('js')


@stop
