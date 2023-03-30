@extends('adminlte::page')

@section('title', 'PROSALUD+')

@section('content_header')
    <h1>Registrar Historia Clínica</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">

            <form action="{{ route('historias.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <h2>Ficha de Identificación</h2>

                <div class="row" style="padding-top: 0.40rem">
                    <div class="col-md-12">
                        <label for="estado">Paciente</label>
                        <select name="paciente_id" class="focus border-primary  form-control">
                            @foreach ($pacientes as $paciente)
                                <option value="{{ $paciente->id }}">{{ $paciente->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                
                 
                </div>

                <div class="row" style="padding-top: 0.40rem">
                    <div class="col-md-6">
                        <label for="descripcion"> Descripcion</label>
                        <textarea type="text" name="descripcion" class="form-control" value="" required></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="diagnostico"> Diagnostico</label>
                        <textarea type="text" name="diagnostico" class="form-control" value="" required></textarea>
                    </div>
                </div>

                <div class="row" style="padding-top: 0.40rem">
                    <div class="col-md-6">
                        <label for="enfermedad_act"> Enfermedad Actual</label>
                        <input type="text" name="enfermedad_act" class="form-control" value="" required>
                    </div>
                    <div class="col-md-6">
                        <label for="plan_terapeutico"> Plan Terapeutico</label>
                        <input type="text" name="plan_terapeutico" class="form-control" value="" required>
                    </div>
                </div>

                <br>
                <h2>Antecedentes Patologicos</h2>

                <div class="row" style="padding-top: 0.40rem">

                    <div class="col-md-4">
                        <label for="caridovas">Cardivascular:</label>
                        <select name="cardiovas" class="focus border-primary  form-control">
                            <option value="SI">SI</option>
                            <option value="NO">NO</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="pulmonar">Pulmonar:</label>
                        <select name="pulmonar" class="focus border-primary  form-control">
                            <option value="SI">SI</option>
                            <option value="NO">NO</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="alergico">Alargias:</label>
                        <select name="alergico" class="focus border-primary  form-control">
                            <option value="SI">SI</option>
                            <option value="NO">NO</option>
                        </select>
                    </div>

                </div>

                <div class="row"style="padding-top: 0.40rem" >

                    <div class="col-md-4">
                        <label for="digestivo">Digestivos:</label>
                        <select name="digestivo" class="focus border-primary  form-control">
                            <option value="SI">SI</option>
                            <option value="NO">NO</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="renales">Renales:</label>
                        <select name="renales" class="focus border-primary  form-control">
                            <option value="SI">SI</option>
                            <option value="NO">NO</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="quirurgico">Quirurgicos:</label>
                        <select name="quirurgico" class="focus border-primary  form-control">
                            <option value="SI">SI</option>
                            <option value="NO">NO</option>
                        </select>
                    </div>
                </div>


                <div class="row"style="padding-top: 0.40rem" >
                    <div class="col-md-6">
                        <label for="transfusion">Transfusion :</label>
                        <select name="transfusion" class="focus border-primary  form-control">
                            <option value="SI">SI</option>
                            <option value="NO">NO</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="diabetes">Diabetes :</label>
                        <select name="diabetes" class="focus border-primary  form-control">
                            <option value="SI">SI</option>
                            <option value="NO">NO</option>
                        </select>
                    </div>
                </div>

                <div class="row" style="padding-top: 0.40rem">
                    <div class="col-md-6">
                        <label for="medicamento"> Medicamentos:</label>
                        <textarea type="text" name="medicamento" class="form-control" value="" required></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="descripcion"> Detallado de Uso de Medicamentos</label>
                        <textarea type="text" name="descripcionPato" class="form-control" value="" required></textarea>
                    </div>
                </div>

                <br>

                <h2>Antecedentes NO Patologicos</h2>

                <div class="row" style="padding-top: 0.40rem">
                    <div class="col-md-4">
                        <label for="inmunizacion">Inmunizacion :</label>
                        <select name="inmunizacion" class="focus border-primary  form-control">
                            <option value="SI">SI</option>
                            <option value="NO">NO</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="alcohol">Alcoholismo :</label>
                        <select name="alcohol" class="focus border-primary  form-control">
                            <option value="SI">SI</option>
                            <option value="NO">NO</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="tabaquismo">Tabaquismo :</label>
                        <select name="tabaquismo" class="focus border-primary  form-control">
                            <option value="SI">SI</option>
                            <option value="NO">NO</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="padre"> Nombre de Padre:</label>
                        <input type="text" name="padre" class="form-control" value="" required>
                    </div>
                    <div class="col-md-6">
                        <label for="enfermedad_padre">Enfermedad de Padre:</label>
                        <input type="text" name="enfermedad_padre" class="form-control" value="" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <label for="madre"> Nombre de Madre:</label>
                        <input type="text" name="madre" class="form-control" value="" required>
                    </div>
                    <div class="col-md-6">
                        <label for="enfermedad_madre">Enfermedad de Madre:</label>
                        <input type="text" name="enfermedad_madre" class="form-control" value="" required>
                    </div>
                </div>

                <div class="row" style="padding-top: 0.40rem">
                    <div class="col-md-6">
                        <label for="cant_hermano"> Cantidad de Hermanos:</label>
                        <input type="number" name="cant_hermano" class="form-control" value="" required>
                    </div>
                    <div class="col-md-6">
                        <label for="cant_vivo"> Cantidad de Hermanos Vivos:</label>
                        <input type="number" name="cant_vivo" class="form-control" value="" required>
                    </div>
                </div>



                <div class="row" style="padding-top: 0.40rem">
                    <div class="col-md">
                        <label for="enfermedad_h">Enfermedad de Hermanos:</label>
                        <textarea type="text" name="enfermedad_h" class="form-control" value="" required> </textarea>
                    </div>
                </div>
                <br>
                

                <div class="form-group">
                    <button class="btn btn-primary" type="submit" value="required">Añadir Historia</button>
                    <a class="btn btn-danger" href="{{ route('historias.index') }}">Volver</a>
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
