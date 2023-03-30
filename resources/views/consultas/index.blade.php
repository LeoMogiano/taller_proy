@extends('adminlte::page')

@section('title', 'PROSALUD+')

@section('content_header')
    <h1>Lista Citas Médicas</h1>
@stop
@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@endsection

@section('content')
    <div class="card">
        @can('Admin')
        <div class="card-header">

            <a class="btn btn-primary" href="{{ route('consultas.create') }}">+ Cita Medica</a>

        </div>
        @endcan
        <div class="card-body">
            <table class="table table-striped table-bordered shadow-lg mt-4" id="consultas">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Descripción</th>
                        <th>Médico</th>
                        <th>Paciente</th>
                        <th>Diagnostico</th>
                        <th>Tratamiento</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>

                    
                    @foreach ($consultas as $consulta)
                    @can('Admin')
                        <tr>
                            <td>{{ $consulta->id }}</td>
                            <td>{{ $consulta->fecha_consulta }}</td>
                            <td>{{ $consulta->hora }}</td>
                            <td>{{ $consulta->descripcion }}</td>
                            
                            @foreach ($medicos as $medico)
                                @if ($consulta->doctor_id == $medico->id)
                                    <td>{{ $medico->nombre }}</td>
                                @endif
                            @endforeach

                            @foreach ($pacientes as $paciente)
                                @if ($consulta->paciente_id == $paciente->id)
                                    <td>{{ $paciente->nombre }}</td>
                                @endif
                            @endforeach

                            @if ( $consulta->diagnostico )
                            <td>{{ $consulta->diagnostico }}</td>
                            <td>{{ $consulta->tratamiento }}</td>

                            @else
                            <td>En Espera</td>
                            <td>En Espera</td>
                            @endif


                            <td>
                               
                                <form action="{{ route('pacientes.edit', $paciente) }}" method="post" >
                                    <a href="{{ route('pacientes.destroy', $paciente) }}"
                                        class="btn btn-primary btn-sm rounded-pill">
                                        <i class="fas fa-edit" ></i></a>
                                    @csrf
                                    @method('delete')
                                    <button onclick="return confirm('¿ESTÁ SEGURO DE BORRAR?')" type="submit"
                                        value="Borrar" class="btn btn-danger btn-sm text-light rounded-pill">
                                        <i class="fas fa-trash-alt"></i></button>
                                        <a href="{{ url('consultas/diagnostico', $consulta->id) }}" style="margin-top: 0.35rem; margin-bottom: 0.35rem" class="btn btn-warning btn-sm text-dark rounded-pill"><i class="fas fa-plus-square"></i> Diagnostico</a>
                                </form>
                                
                            </td>
                           
                       
                        </tr>
                        @endcan

                        @can('Medico')
                        @if (Auth::user()->cod_m == $consulta->id_medico)
                            
                        
                        <tr>
                            <td>{{ $consulta->id }}</td>
                            <td>{{ $consulta->fecha }}</td>
                            <td>{{ $consulta->hora }}</td>
                            <td>{{ $consulta->descripcion }}</td>
                            @foreach ($medicos as $medico)
                                @if ($consulta->id_medico == $medico->id)
                                    <td>{{ $medico->nombre }}</td>
                                @endif
                            @endforeach

                            @foreach ($pacientes as $paciente)
                                @if ($consulta->id_paciente == $paciente->id)
                                    <td>{{ $paciente->nombre }}</td>
                                @endif
                            @endforeach

                            @foreach ($diagnosticos as $diagnostico)
                                @if (($consulta->id == $diagnostico->id_consulta))
                                    <td>{{$diagnostico->descripcion}}</td>
                                    <td>{{$diagnostico->receta}}</td>

                                @endif
                                
    
                            @endforeach
                           
                            <td>

                                <a href="{{ url('consultas/diagnostico', $consulta->id) }}" style="margin-top: 0.10rem" class="btn btn-warning btn-sm"><i class="fas fa-plus-square"></i> Diagnostico</a>



                            </td>
                        </tr>
                        @endif
                        @endcan

                        @can('Paciente')
                        @if (Auth::user()->cod_p == $consulta->id_paciente)
                            
                        
                        <tr>
                            <td>{{ $consulta->id }}</td>
                            <td>{{ $consulta->fecha }}</td>
                            <td>{{ $consulta->hora }}</td>
                            <td>{{ $consulta->descripcion }}</td>
                            @foreach ($medicos as $medico)
                                @if ($consulta->id_medico == $medico->id)
                                    <td>{{ $medico->nombre }}</td>
                                @endif
                            @endforeach

                            @foreach ($pacientes as $paciente)
                                @if ($consulta->id_paciente == $paciente->id)
                                    <td>{{ $paciente->nombre }}</td>
                                @endif
                            @endforeach

                            @foreach ($diagnosticos as $diagnostico)
                                @if (($consulta->id == $diagnostico->id_consulta))
                                    <td>{{$diagnostico->descripcion}}</td>
                                    <td>{{$diagnostico->receta}}</td>

                                @endif
                                
    
                            @endforeach
                           
                            <td>

                               NO DISPONIBLE


                              

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
        $('#consultas').DataTable({
            autoWidth: false
        });
    </script>
@endsection
