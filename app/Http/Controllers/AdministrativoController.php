<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdministrativoController extends Controller
{

    public function index()
    {
        //Se excluye el id correspondiente al coordinador
        $administrativos = User::select('id','name','email')->whereNotIn('id', [1])->get();
        return view('coordinacion.administrativos.index', ['administrativos'=>$administrativos]);
    }

    public function create()
    {
        return view('coordinacion.administrativos.create');
    }

    public function store(Request $request)
    {
        $administrativos = new User();

        $administrativos->name = request('name');
        $administrativos->email = request('email');
        $administrativos->password = bcrypt(request('password'));

        $administrativos->save();

        //se obtiene el rol administrativo con el id 2 en la tabla roles
        $role = Role::all()->where('id',2);
        //se usa el metodo asignarRole del modelo Users
        $administrativos->asignarRole($role);

        return redirect('/administrativos');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        return view('coordinacion.administrativos.edit', ['administrativo'=>User::findOrFail($id)]);
    }

    public function update(Request $request, $id)
    {
        $administrativo = User::findOrFail($id);

        $administrativo->name = $request->get('name');
        $administrativo->email = $request->get('email');

        $administrativo->update();
        return redirect('/administrativos');
    }

    public function destroy($id)
    {
        $administrativo = User::findOrFail($id);

        $administrativo->delete();

        return redirect('administrativos');
    }
}
