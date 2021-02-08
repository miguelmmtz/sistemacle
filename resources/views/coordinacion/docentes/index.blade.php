@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Docentes <a href="docentes/create"><button type="button" class="btn btn-success float-right">Agregar docente</button></a></h2>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Idioma</th>
                <th scope="col">Tel&eacute;fono</th>
                <th scope="col">Email</th>
                <th scope="col">Opciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($docentes as $docente)
                <tr>
                    <td>{{$docente->name}}</td>
                    <td>{{$docente->idioma}}</td>
                    <td>{{$docente->telefono}}</td>
                    <td>{{$docente->email}}</td>
                    <td>
                        <form action="{{route('docentes.destroy',$docente->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{route('docentes.edit',$docente->id)}}"><button type="button" class="btn btn-secondary"><i class="far fa-edit"></i></button></a>
                            <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
