@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-7">
                <h2>A&ntilde;adir Alumno</h2>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="/alumnos" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="matricula" class="form-label">Matr&iacute;cula</label>
                        <input type="text" class="form-control" name="matricula">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="carrera" class="form-label">Carrera</label>
                        <select name="carrera" class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option selected>SELECCIONE LA CARRERA</option>
                            <option value="ING. SISTEMAS COMPUTACIONALES">ING. SISTEMAS COMPUTACIONALES</option>
                            <option value="ING. INDUSTRIAL">ING. INDUSTRIAL</option>
                            <option value="ING. BIOQUIMICA">ING. BIOQUIMICA</option>
                            <option value="ING. ELECTROMECANICA">ING. ELECTROMECANICA</option>
                            <option value="ING. ELECTRONICA">ING. ELECTRONICA</option>
                            <option value="ING. INDUSTRIAS ALIMENTARIAS">ING. INDUSTRIAS ALIMENTARIAS</option>
                            <option value="LIC. GASTRONOMIA">LIC. GASTRONOMIA</option>
                            <option value="ING. CIVIL">ING. CIVIL</option>
                            <option value="ING. MECATRONICA">ING. MECATRONICA</option>
                            <option value="ING. GESTION EMPRESARIAL">ING. GESTION EMPRESARIAL</option>
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
