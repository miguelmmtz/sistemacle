@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Alumno {{$alumnos->name}}</h1>
        <h3>Matr&iacute;cula: {{$alumnos->matricula}}</h3>
        <h3>Carrera: {{$alumnos->carrera}}</h3>
        <h3>Tel&eacute;fono: {{$alumnos->telefono}}</h3>
        <h3>Email: {{$alumnos->email}}</h3>
        <h3>Grupo actual: {{$alumnos->id_grupo}}</h3>

        <a href="{{url('alumnos')}}"><button type="button" class="btn btn-dark"><i class="fas fa-long-arrow-alt-left"></i></button></a>
    </div>
@endsection
