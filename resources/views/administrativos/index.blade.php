@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Administrativos <a href="administrativos/create"><button type="button" class="btn btn-success float-right">Agregar administrativo</button></a></h2>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Email</th>
                <th scope="col">Opciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($administrativos as $administrativo)
                <tr>
                    <td>{{$administrativo->name}}</td>
                    <td>{{$administrativo->email}}</td>
                    <td>
                        <form action="{{route('administrativos.destroy',$administrativo->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <a href="{{route('administrativos.edit',$administrativo->id)}}"><button type="button" class="btn btn-secondary"><i class="far fa-edit"></i></button></a>
                            <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
