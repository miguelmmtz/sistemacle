@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Alumnos <a href="alumnos/create"><button type="button" class="btn btn-success float-right">Agregar alumno</button></a></h2>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Matr&iacute;cula</th>
                <th scope="col">Nombre</th>
                <th scope="col">Carrera</th>
                <th scope="col">Opciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($alumnos as $alumno)
                <tr>
                    <td>{{$alumno->matricula}}</td>
                    <td>{{$alumno->name}}</td>
                    <td>{{$alumno->carrera}}</td>
                    <td>
                        <form action="{{route('alumnos.destroy',$alumno->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{route('alumnos.show',$alumno->id)}}"><button type="button" class="btn btn-dark"><i class="far fa-eye"></i></button></a>
                            <a href="{{route('alumnos.edit',$alumno->id)}}"><button type="button" class="btn btn-secondary"><i class="far fa-edit"></i></button></a>
                            <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
