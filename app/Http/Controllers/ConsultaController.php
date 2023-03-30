<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use App\Models\medico;
use App\Models\Paciente;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    public function index()
    {
        $medicos = medico::all();
        $pacientes = Paciente::all();
        $consultas = Consulta::all();
       
        return view('consultas.index', compact('medicos', 'pacientes', 'consultas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medicos = medico::all();
        $pacientes = Paciente::all();

        return view('consultas.create', compact('medicos', 'pacientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $consultas = new Consulta();
        $consultas->fecha_consulta = $request->input('fecha');
        $consultas->hora = $request->input('hora');
        $consultas->descripcion = $request->input('descripcion');
        $consultas->doctor_id = $request->input('doctor_id');
        $consultas->paciente_id = $request->input('paciente_id');
        $consultas->save();


        return redirect()->route('consultas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $consulta = Consulta::where('id',$id)->first();
        $medicos = medico::all();
        $pacientes = Paciente::all();
        return view('consultas.edit', compact('medicos', 'pacientes', 'consulta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $consultas = Consulta::where('id',$id)->first();
        $consultas->fecha_consulta = $request->input('fecha_consulta');
        $consultas->hora = $request->input('hora');
        $consultas->descripcion = $request->input('descripcion');
        $consultas->doctor_id = $request->input('doctor_id');
        $consultas->paciente_id = $request->input('paciente_id');
        $consultas->save();

        return redirect()->route('consultas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $consultas = Consulta::where('id',$id)->first();
        $consultas->delete();

        return redirect()->route('consultas.index');
    }

    public function diagnostico($id)
    {
        $consulta = Consulta::where('id',$id)->first();

        return view('consultas.diagnostico', compact('consulta',));
    }

    public function diag_store(Request $request, $id)
    {
    
        $consulta = Consulta:: find($id);
        $consulta->diagnostico = $request->diagnostico;
        $consulta->tratamiento = $request->tratamiento;
        $consulta->save();


        return redirect()->route('consultas.index');
    }
}
