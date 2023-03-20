<?php

namespace App\Http\Controllers;

use App\Models\medico;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class medicoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $medicos = medico::all();
    
       return view('medicos.index',compact('medicos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('medicos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validacion para que sea requerido
     
        //crea el medico atributo por atributo
        $medico=new medico();
        $medico->nombre=$request->input('nombre');
        $medico->edad=$request->input('edad');
        $medico->sexo=$request->input('sexo');
        $medico->direccion=$request->input('direccion');
        $medico->telefono=$request->input('telefono');
        $medico->especialidad=$request->input('especialidad');
        $medico->save();

        $user = new User();
        $user->name = $medico->nombre;
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->cod_m = $medico->id;
        $user->assignRole('Medico');
        $user->save();

       
        return redirect()->route('medicos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $medico=medico::findOrFail($id);
        return view('medicos.edit',compact('medico'));
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
        
        $medico=medico::findOrFail($id);
        $medico->nombre=$request->input('nombre');
        $medico->edad=$request->input('edad');
        $medico->sexo=$request->input('sexo');
        $medico->direccion=$request->input('direccion');
        $medico->telefono=$request->input('telefono');
        $medico->especialidad=$request->input('especialidad');
        $medico->save();

        $user = User::where('cod_m',$medico->id)->first();
        $user->name = $medico->nombre;
        $user->save();

    
        return redirect()->route('medicos.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $medico= medico::findOrFail($id);

        $medico->delete();

        $user = User::where('cod_m', $medico->id);
        $user->delete();

        return redirect()->route('medicos.index');


    }

   /*  public function especialidad($id)
    {
        $medico= medico::findOrFail($id);
        return view('medicos.especialidad',compact('medico'));
    } */
/* 
    public function esp_store(Request $request)
    {
       $esp = new Especialidad();
       $esp->descripcion = $request->input('descripcion');
       $esp->id_medico = $request->input('id_medico');
       $esp->save();

       activity()->useLog('Especialidad')->log('Registró Especialidad')->subject();
        $lastActivity=Activity::all()->last();
        $lastActivity->subject_id= $esp->id;
        $lastActivity->save();

       return redirect()->route('medicos.index');
        
    } */
}
