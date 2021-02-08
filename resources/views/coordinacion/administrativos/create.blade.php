@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-7">
                <h2>A&ntilde;adir Administrativo</h2>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="/administrativos" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="name">
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
