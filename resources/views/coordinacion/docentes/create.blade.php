@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-7">
                <h2>A&ntilde;adir Docente</h2>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="/docentes" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="idioma" class="form-label">Idioma</label>
                        <select name="idioma" class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option selected>SELECCIONE EL IDIOMA</option>
                            <option value="INGLES">INGLES</option>
                            <option value="FRANCES">FRANCES</option>
                            <option value="ALEMAN">ALEMAN</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Tel&eacute;fono</label>
                        <input type="text" class="form-control" name="telefono">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Contrase&ntilde;a</label>
                        <input type="password" class="form-control" name="password">
                    </div>

                    <button type="submit" class="btn btn-primary">A&ntilde;adir</button>
                    <button type="reset" class="btn btn-danger">Cancelar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
