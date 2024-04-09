@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">PROFILE</h1>
@stop

@section('css')
    <link rel="stylesheet" href="/styles/barcode-create.css">
    <link rel="icon" href="/logo.jpg" type="image/jpeg">
@stop

@section('content')
<div class="container my-5">
    <div class="card">
        <div class="card-header text-blanco bg-rojo">
            <h4>Perfil de Usuario</h4>
        </div>
        <div class="card-body">
            <form>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre:</label>
                    <input type="text" class="form-control" id="nombre" value="Juan Pérez">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" value="juan.perez@example.com">
                </div>
                <div class="mb-3">
                    <label for="fechaNacimiento" class="form-label">Fecha de Nacimiento:</label>
                    <input type="date" class="form-control" id="fechaNacimiento" value="1990-01-01">
                </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label">Teléfono:</label>
                    <input type="tel" class="form-control" id="telefono" value="+1234567890">
                </div>
                <div class="mb-3">
                    <label for="direccion" class="form-label">Dirección:</label>
                    <input type="text" class="form-control" id="direccion" value="Calle Falsa 123">
                </div>
                <button type="submit" class="btn btn-success">Editar</button>
            </form>
        </div>
    </div>
</div>

@stop
