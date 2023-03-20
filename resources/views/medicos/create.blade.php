@extends('adminlte::page')

@section('title', 'PROSALUD+')

@section('content_header')
    <h1>Registrar Medico</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            <form action="{{ route('medicos.store') }}" method="post">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <label for="nombre">Nombre Completo</label>
                        <input type="text" name="nombre" class="form-control" value="" required>
                    </div>
                    <div class="col-md-6">
                        <label for="edad">Edad</label>
                        <input type="number" name="edad" class="form-control" value="" required>

                    </div>
                </div>
                

                <div class="row" style="padding-top: 10px">
                    <div class="col-md-6">
                        <label for="sexo">  Género</label>
                        <select name="sexo" class="focus border-primary  form-control">
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="telefono">Número de Teléfono</label>
                        <input type="number" name="telefono" class="form-control" value="" required>
                    </div>
                </div>



       
                <div class="row" style="padding-top: 10px">
                    <div class="col-md-6">
                        <label for="correo">Correo Eletrónico</label>
                        <input type="email" name="email" class="form-control" value="" required>
                    </div>
                    <div class="col-md-6">
                        <label for="direccion">Dirección de Domicilio</label>
                        <input type="text" name="direccion" class="form-control" value="" required>

                    </div>


                </div>


                
                <div class="row" style="padding-top: 10px">
                    <div class="col-md-6">
                        <label for="password">Contraseña</label>
                        <input type="text" name="password" class="form-control" value="" required>
                    </div>
                    <div class="col-md-6">
                        <label for="descripcion">Especialidad</label>
                        <input type="text" name="especialidad" class="form-control" value="" required>
                    </div>
                </div>


            

                <div style="padding-top: 20px">
                    <button class="btn btn-primary" type="submit" value="required">Añadir Medico</button>
                    <a class="btn btn-danger" href="{{ route('medicos.index') }}">Volver</a>
                </div>


        </div>

        </form>


    </div>

@stop

@section('css')
    <link rel="shortcut icon" href="{{ asset('img/logo.jpg') }}" type="image/x-icon">
@stop

@section('js')

@stop
