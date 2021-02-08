<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlumnoController extends Controller
{
    //para el login
    use AuthenticatesUsers;

    protected function guard()
    {
        return Auth::guard('alumno');
    }

    public function showLoginForm()
    {
        return view('alumno.login');
    }

    public function authenticated()
    {
        return redirect('alumno/');
    }

    //metodos para la coordinacion
    public function index()
    {
        $alumnos = Alumno::all();
        return view('coordinacion.alumnos.index', ['alumnos'=>$alumnos]);
    }

    public function create()
    {
        return view('coordinacion.alumnos.create');
    }

    public function store(Request $request)
    {
        $alumnos = new Alumno();

        $alumnos->matricula = request('matricula');
        $alumnos->name = request('name');
        $alumnos->carrera = request('carrera');
        $alumnos->telefono = request('telefono');
        $alumnos->email = request('email');
        $alumnos->password = bcrypt(request('password'));

        $alumnos->save();

        return redirect('/alumnos');
    }

    public function show($id)
    {
        return view('coordinacion.alumnos.show', ['alumnos'=>Alumno::findOrFail($id)]);
    }

    public function edit($id)
    {
        return view('coordinacion.alumnos.edit', ['alumnos'=>Alumno::findOrFail($id)]);
    }

    public function update(Request $request, $id)
    {
        $alumno = Alumno::findOrFail($id);

        $alumno->matricula = $request->get('matricula');
        $alumno->name = $request->get('name');
        $alumno->carrera = $request->get('carrera');
        $alumno->telefono = $request->get('telefono');
        $alumno->email = $request->get('email');
        $alumno->password = bcrypt($request->get('password'));

        $alumno->update();
        return redirect('/alumnos');
    }

    public function destroy($id)
    {
        $alumno = Alumno::findOrFail($id);

        $alumno->delete();

        return redirect('alumnos');
    }

    //metodos para los alumnos
    public function hola(){
        return "Bienvenido alumno(a)";
    }
}
