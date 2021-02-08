@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Grupos <a href="grupos/create"><button type="button" class="btn btn-success float-right">Agregar grupo</button></a></h2>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Idioma</th>
                <th scope="col">Nivel</th>
                <th scope="col">Modalidad</th>
                <th scope="col">Horario</th>
                <th scope="col">Opciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($grupos as $grupo)
                <tr>
                    <td>{{$grupo->nombre}}</td>
                    <td>{{$grupo->idioma}}</td>
                    <td>{{$grupo->nivel}}</td>
                    <td>{{$grupo->modalidad}}</td>
                    <td>{{$grupo->horario}}</td>
                    <td>
                        <form action="{{route('grupos.destroy',$grupo->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{route('grupos.show',$grupo->id)}}"><button type="button" class="btn btn-dark"><i class="far fa-eye"></i></button></a>
                            <a href="{{route('grupos.edit',$grupo->id)}}"><button type="button" class="btn btn-secondary"><i class="far fa-edit"></i></button></a>
                            <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
