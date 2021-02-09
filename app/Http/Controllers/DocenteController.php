<?php

namespace App\Http\Controllers;

use App\Models\Docente;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DocenteController extends Controller
{

    //para el login
    use AuthenticatesUsers;

    protected function guard()
    {
        return Auth::guard('docente');
    }

    public function showLoginForm()
    {
        return view('docente.login');
    }

    public function authenticated()
    {
        return redirect('docente/');
    }

    //metodos para la coordinacion
    public function index()
    {
        $docentes = Docente::all();
        return view('coordinacion.docentes.index', ['docentes'=>$docentes]);
    }

    public function create()
    {
        return view('coordinacion.docentes.create');
    }

    public function store(Request $request)
    {
        $docentes = new Docente();

        $docentes->name = request('name');
        $docentes->idioma = request('idioma');
        $docentes->telefono = request('telefono');
        $docentes->email = request('email');
        $docentes->password = bcrypt(request('password'));

        $docentes->save();

        return redirect('/docentes');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        return view('coordinacion.docentes.edit', ['docentes'=>Docente::findOrFail($id)]);
    }

    public function update(Request $request, $id)
    {
        $docente = Docente::findOrFail($id);

        $docente->name = $request->get('name');
        $docente->idioma = $request->get('idioma');
        $docente->telefono = $request->get('telefono');
        $docente->email = $request->get('email');
        $docente->password = bcrypt($request->get('password'));

        $docente->update();
        return redirect('/docentes');
    }

    public function destroy($id)
    {
        $docente = Docente::findOrFail($id);

        $docente->delete();

        return redirect('docentes');
    }

    //metodos para los alumnos
    public function hola(){
        return "Bienvenido docente";
    }
}
