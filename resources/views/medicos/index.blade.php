@extends('adminlte::page')

@section('title', 'PROSALUD+')

@section('content_header')
    <h1>Lista Médicos</h1>
@stop
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
    <link rel="shortcut icon" href="{{ asset('img/logo.jpg') }}" type="image/x-icon">
@endsection

@section('content')
    <div class="card">
        @can('Admin')
            <div class="card-header">

                <a class="btn btn-primary" href="{{ route('medicos.create') }}">Registrar Medico</a>

            </div>
        @endcan
        <div class="card-body">
            <table class="table table-striped table-bordered shadow-lg mt-4" id="medicos">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre </th>
                        <th>Edad</th>
                        <th>Sexo</th>
                        <th>Dirección</th>
                        <th>Telefono</th>
                        <th>Especialidad</th>
                        <th>Opciones</th>

                    </tr>
                </thead>
                <tbody>

                    @foreach ($medicos as $medico)
                        @can('Admin')
                            <tr>
                                <td>{{ $medico->id }}</td>
                                <td>{{ $medico->nombre }}</td>
                                <td>{{ $medico->edad }}</td>
                                <td>{{ $medico->sexo }}</td>
                                <td>{{ $medico->direccion }}</td>
                                <td>{{ $medico->telefono }}</td>
                                <td>{{ $medico->especialidad }}</td>

                                

                                <td>
                                    <form action="{{ route('medicos.edit', $medico) }}" method="post">
                                        <a href="{{ route('medicos.destroy', $medico) }}"
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
                        @endcan

                        @can('Medico')
                            @if (Auth::user()->cod_m == $medico->id)
                                <tr>
                                    <td>{{ $medico->id }}</td>
                                    <td>{{ $medico->nombre }}</td>
                                    <td>{{ $medico->edad }}</td>
                                    <td>{{ $medico->sexo }}</td>
                                    <td>{{ $medico->direccion }}</td>
                                    <td>{{ $medico->telefono }}</td>
                                    <td>{{ $medico->especialidad }}</td>
                                    <td>
                                        <a class="btn btn-primary btn-sm" style="margin-top: 5px"
                                            href="{{ route('medicos.edit', $medico) }}"><i class="fas fa-pencil-alt"></i>
                                            Editar</a>
                                    </td>
                                </tr>
                            @endif
                        @endcan
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@stop



@section('js')
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $('#medicos').DataTable({
            autoWidth: false
        });
    </script>
@endsection
