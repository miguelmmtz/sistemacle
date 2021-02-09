@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Grupo: {{$grupos->nombre}}</h1>
        <h3>Idioma: {{$grupos->idioma}}</h3>
        <h3>Nivel: {{$grupos->nivel}}</h3>
        <h3>Modalidad: {{$grupos->modalidad}}</h3>
        <h3>Horario: {{$grupos->horario}}</h3>
        <h3>Salón: {{$grupos->salon}}</h3>
        <h3>Periodo: {{$grupos->periodo}}</h3>
        <h3>Cantidad de alumnos: {{$grupos->cantAlumnos}}</h3>
        <h3>Status: {{$grupos->status}}</h3>
        <h3>Docente: {{str_replace(['[{"name":"','"}]'],"",DB::table('docentes')->select('name')->where('id',$grupos->id_docente)->get())}}</h3>

        <a href="{{url('grupos')}}"><button type="button" class="btn btn-dark"><i class="fas fa-long-arrow-alt-left"></i></button></a>
    </div>
@endsection
