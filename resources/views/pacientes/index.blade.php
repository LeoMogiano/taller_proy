@extends('adminlte::page')

@section('title', 'PROSALUD+')

@section('content_header')
    <h1>Lista Pacientes</h1>
@stop
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <link rel="shortcut icon" href="{{ asset('img/logo.jpg') }}" type="image/x-icon">
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <a class="btn btn-primary" href="{{ route('pacientes.create') }}">Registrar Paciente</a>
        </div>
        <div class="card-body">
            <table class="table table-striped table-bordered shadow-lg mt-4" id="pacientes">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>CI</th>
                        <th>Nombre</th>
                        <th>Edad</th>
                        <th>Sexo</th>
                        <th>Direcciónn</th>
                        <th>Teléfono</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($pacientes as $paciente)
                        <tr>
                            <td>{{ $paciente->id }}</td>
                            <td>{{ $paciente->ci }}</td>
                            <td>{{ $paciente->nombre }}</td>
                            <td>{{ $paciente->edad }}</td>
                            <td>{{ $paciente->sexo }}</td>
                            <td>{{ $paciente->direccion }}</td>
                            <td>{{ $paciente->telefono }}</td>



                            <td>
                                <form action="{{ route('pacientes.edit', $paciente) }}" method="post">
                                    <a href="{{ route('pacientes.destroy', $paciente) }}"
                                        class="btn btn-primary btn-sm text-light rounded-pill">
                                        <i class="fas fa-edit"></i></a>
                                    @csrf
                                    @method('delete')
                                    <button onclick="return confirm('¿ESTÁ SEGURO DE BORRAR?')" type="submit"
                                        value="Borrar" class="btn btn-danger btn-sm text-light rounded-pill">
                                        <i class="fas fa-trash-alt"></i></button>
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
    <link rel="shortcut icon" href="{{ asset('img/logo.jpg') }}" type="image/x-icon">
@stop

@section('js')
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $('#pacientes').DataTable({
            autoWidth: false
        });
    </script>
@endsection
