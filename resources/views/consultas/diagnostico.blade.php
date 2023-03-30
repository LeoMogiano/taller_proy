@extends('adminlte::page')

@section('title', 'PROSALUD+')

@section('content_header')
    <h1>Registrar Diagnóstico a Cita</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
       
            <form action="{{ url('consultas/diag_store', $consulta->id) }}" method="post" >
                @csrf
                
                     <div class="row">
                         <div class="col-md-6">
                            <label for="descripcion">Diagnóstico:</label>
                            <textarea type="text" name="diagnostico" class="form-control"  value=""  required></textarea>
                         </div>
                         <div class="col-md-6">
                            <label for="descripcion">Detalles de Tratamiento:</label>
                            <textarea type="text" name="tratamiento" class="form-control"  value=""  required></textarea>
                         </div>
                     </div>


            
                       
                     <br>
                   
                <div class="form-group">
                    <button  class="btn btn-primary" type="submit" value="required">Añadir Diagnostico</button>
                    <a class="btn btn-danger" href="{{route('consultas.index')}}">Volver</a>
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