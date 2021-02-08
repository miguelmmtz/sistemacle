<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use App\Models\Grupo;
use Illuminate\Http\Request;
use PhpParser\Comment\Doc;

class GrupoController extends Controller
{

    public function index()
    {
        $grupos = Grupo::all();
        return view('coordinacion.grupos.index', ['grupos'=>$grupos]);
    }

    public function create()
    {
        $docentes = Docente::all();
        return view('coordinacion.grupos.create',['docentes'=>$docentes]);
    }

    public function store(Request $request)
    {
        $grupos = new Grupo();

        $grupos->idioma = request('idioma');
        $grupos->nivel = request('nivel');
        $grupos->modalidad = request('modalidad');
        $grupos->horario = request('horario');
        $grupos->nombre = request('nombre');
        $grupos->salon = request('salon');
        $grupos->periodo = request('periodo');
        $grupos->cantAlumnos = request('cantAlumnos');
        $grupos->status = request('status');
        //el campo nombre_docente en realidad contiene el id del docente
        $grupos->id_docente = request('nombre_docente');

        $grupos->save();

        return redirect('/grupos');
    }

    public function show($id)
    {
        return view('coordinacion.grupos.show', ['grupos'=>Grupo::findOrFail($id)]);
    }

    public function edit($id)
    {
        $docentes = Docente::all();
        return view('coordinacion.grupos.edit', ['grupos'=>Grupo::findOrFail($id), 'docentes'=>$docentes]);
    }

    public function update(Request $request, $id)
    {
        $grupos = Grupo::findOrFail($id);

        $grupos->idioma = $request->get('idioma');
        $grupos->nivel = $request->get('nivel');
        $grupos->modalidad = $request->get('modalidad');
        $grupos->horario = $request->get('horario');
        $grupos->nombre = $request->get('nombre');
        $grupos->salon = $request->get('salon');
        $grupos->periodo = $request->get('periodo');
        $grupos->cantAlumnos = $request->get('cantAlumnos');
        $grupos->status = $request->get('status');
        //el campo nombre_docente en realidad contiene el id del docente
        $grupos->id_docente = $request->get('nombre_docente');

        $grupos->update();
        return redirect('/grupos');
    }

    public function destroy($id)
    {
        $grupo = Grupo::findOrFail($id);

        $grupo->delete();

        return redirect('/grupos');
    }
}
