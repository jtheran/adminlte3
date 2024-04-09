@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-dark">CREATE BARCODE</h1>
@stop

@section('css')
    <link rel="stylesheet" href="/styles/barcode-create.css">
    <link rel="icon" href="/logo.jpg" type="image/jpeg">
@stop

@section('content')
    <div class="container my-5">
        <div class="card">
            <div class="card-header text-blanco bg-rojo">
                <h3>Formulario de creacion</h3>
            </div>
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre:</label>
                        <input type="text" class="form-control border border-danger" id="nombre" placeholder="Ingresa tu nombre">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control border border-danger" id="email" placeholder="Ingresa tu email">
                    </div>
                    <div class="mb-3">
                        <label for="mensaje" class="form-label">Mensaje:</label>
                        <textarea class="form-control border border-danger" id="mensaje" rows="3" placeholder="Escribe tu mensaje aquí"></textarea>
                    </div>
                    <button type="submit" class="btn btn-success">Enviar</button>
                </form>
            </div>
        </div>
    </div>

@stop
