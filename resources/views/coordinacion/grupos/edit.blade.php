@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-7">
                <h2>Editar Grupo {{$grupos->nombre}}</h2>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{route('grupos.update',$grupos->id)}}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="mb-3">
                        <label for="idioma" class="form-label">Idioma</label>
                        <select name="idioma" class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option selected value="{{$grupos->idioma}}">{{$grupos->idioma}}</option>
                            <option value="INGLES">INGLES</option>
                            <option value="FRANCES">FRANCES</option>
                            <option value="ALEMAN">ALEMAN</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nivel" class="form-label">Nivel</label>
                        <select name="nivel" class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option selected value="{{$grupos->nivel}}">{{$grupos->nivel}}</option>
                            <option value="NIVEL I">NIVEL I</option>
                            <option value="NIVEL II">NIVEL II</option>
                            <option value="NIVEL III">NIVEL III</option>
                            <option value="NIVEL IV">NIVEL IV</option>
                            <option value="NIVEL V">NIVEL V</option>
                            <option value="PASANTES">PASANTES</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="modalidad" class="form-label">Modalidad</label>
                        <select name="modalidad" class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option selected value="{{$grupos->modalidad}}">{{$grupos->modalidad}}</option>
                            <option value="NORMAL">NORMAL</option>
                            <option value="INTENSIVO">INTENSIVO</option>
                            <option value="SABATINO">SABATINO</option>
                            <option value="DOMINICAL">DOMINICAL</option>
                            <option value="VACACIONAL">VACACIONAL</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="horario" class="form-label">Horario</label>
                        <input type="text" class="form-control" name="horario" value="{{$grupos->horario}}">
                    </div>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombre" value="{{$grupos->nombre}}">
                    </div>
                    <div class="mb-3">
                        <label for="salon" class="form-label">Sal&oacute;n</label>
                        <select name="salon" class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option selected value="{{$grupos->salon}}">{{$grupos->salon}}</option>
                            <option value="CLE01">CLE01</option>
                            <option value="CLE02">CLE02</option>
                            <option value="CLE03">CLE03</option>
                            <option value="CLE04">CLE04</option>
                            <option value="CLE05">CLE05</option>
                            <option value="CLE06">CLE06</option>
                            <option value="CLE07">CLE07</option>
                            <option value="CLE08">CLE08</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="periodo" class="form-label">Periodo</label>
                        <input type="text" class="form-control" name="periodo" value="{{$grupos->periodo}}">
                    </div>
                    <div class="mb-3">
                        <label for="cantAlumnos" class="form-label">Cantidad de alumnos</label>
                        <input type="text" class="form-control" name="cantAlumnos" value="{{$grupos->cantAlumnos}}">
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option selected value="{{$grupos->status}}">{{$grupos->status}}</option>
                            <option value="PENDIENTE">PENDIENTE</option>
                            <option value="APROBADO">APROBADO</option>
                            <option value="FINALIZADO">FINALIZADO</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nombre_docente" class="form-label">Docente</label>
                        <select name="nombre_docente" class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option selected value="{{$grupos->id_docente}}">{{str_replace(['[{"name":"','"}]'],"",DB::table('docentes')->select('name')->where('id',$grupos->id_docente)->get())}}</option>
                            @foreach($docentes as $docente)
                                <option value="{{$docente->id}}">{{$docente->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                    <button type="reset" class="btn btn-danger">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
