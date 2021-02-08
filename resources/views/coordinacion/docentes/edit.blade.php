@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-7">
                <h2>Editar Docente {{$docentes->name}}</h2>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{route('docentes.update',$docentes->id)}}" method="POST">
                    @method('PATCH')
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="name" value="{{$docentes->name}}">
                    </div>
                    <select name="idioma" class="form-select form-select-sm" aria-label=".form-select-sm example">
                        <option selected value="{{$docentes->idioma}}">{{$docentes->idioma}}</option>
                        <option value="INGLES">INGLES</option>
                        <option value="FRANCES">FRANCES</option>
                        <option value="ALEMAN">ALEMAN</option>
                    </select>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Tel&eacute;fono</label>
                        <input type="text" class="form-control" name="telefono" value="{{$docentes->telefono}}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="{{$docentes->email}}">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contrase&ntilde;a</label>
                        <input type="password" class="form-control" name="password">
                    </div>

                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    <button type="reset" class="btn btn-danger">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
