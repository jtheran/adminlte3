@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-danger">CARGAR ARCHIVO</h1>
@stop

@section('content')
{!! Form::open(['route' => ['admin.file.store'], 'method' => 'POST', 'files' => true]) !!}
<div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-8 col-md-8">
                    <div class="form-group">
                        {{ Form::label('NOMBRE:', null, ['class' => 'control-label']) }}
                        {{ Form::text('name',"",array_merge(['class' => 'form-control'])) }}
                    </div>
                </div>
                <div class="col-8 col-md-8">
                    <div class="form-group">
                            {{ Form::label('RUTA:', null, ['class' => 'control-label']) }}
                            {{ Form::file('file',['class' => 'form-control']) }}
                    </div>
                </div>
            </div>
        </div>
</div>

<div class="row">
            <div class="col-8">
                <div class="float-right">
                    <a href="{{ route('admin.file.index') }}" class="btn btn-outline-danger"> Cancelar</a>
                    <button type="submit" class="btn btn-success" >CREAR</button>
                </div>
            </div>
        </div>

        {!! Form::close() !!}
@stop


@section('css')
    <link rel="icon" href="/logo.jpg" type="image/jpeg">
@stop
