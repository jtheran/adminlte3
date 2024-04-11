@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-danger">EDITAR</h1>
@stop

@section('content')
{!! Form::open(['route' => ['admin.children.update', $child->id], 'method' => 'PUT']) !!}
<div class="card">
        <div class="card-body">
            <div class="row">   
                <div class="col-8 col-md-8">
                    <div class="form-group">
                        {{ Form::label('NOMBRE:', null, ['class' => 'control-label']) }}
                        {{ Form::text('firstname', $child->firstname, array_merge(['class' => 'form-control'])) }}
                    </div>
                </div>
                <div class="col-8 col-md-8">
                    <div class="form-group">
                            {{ Form::label('APELLIDO:', null, ['class' => 'control-label']) }}
                            {{ Form::text('lastname', $child->lastname, array_merge(['class' => 'form-control'])) }}
                    </div>
                </div>
                <div class="col-8 col-md-8">
                    <div class="form-group">
                            {{ Form::label('IDENTIFICACION:', null, ['class' => 'control-label']) }}
                            {{ Form::text('identification', $child->identification, array_merge(['class' => 'form-control'])) }}
                    </div>
                </div>
                <div class="col-8 col-md-8">
                    <div class="form-group">
                            {{ Form::label('TIPO DE IDENTIFICACION:', null, ['class' => 'control-label']) }}
                            {{ Form::select('identification_type', array('cedula de ciudadania' => 'Cedula de Ciudadania', 'tarjeta de identidad' => 'Tarjeta de Identidad', 'registro civil' => 'Registro Civil'), $child->identification_type, ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="col-8 col-md-8">
                    <div class="form-group">
                            {{ Form::label('EMPRESA PRESTADORA DE SALUD:', null, ['class' => 'control-label']) }}
                            {{ Form::text('eps', $child->eps, array_merge(['class' => 'form-control'])) }}
                    </div>
                </div>
                <div class="col-8 col-md-8">
                    <div class="form-group">
                            {{ Form::label('DIRECCION:', null, ['class' => 'control-label']) }}
                            {{ Form::text('address', $child->address, array_merge(['class' => 'form-control'])) }}
                    </div>
                </div>
                <div class="col-8 col-md-8">
                    <div class="form-group">
                            {{ Form::label('EDAD:', null, ['class' => 'control-label']) }}
                            {{ Form::text('age', $child->age, array_merge(['class' => 'form-control'])) }}
                    </div>
                </div>
            </div>
        </div>
</div>

<div class="row">
            <div class="col-8">
                <div class="float-right">
                    <a href="{{ route('admin.children.index') }}" class="btn btn-outline-danger"> Cancelar</a>
                    <button type="submit" class="btn btn-success" >Guardar</button>
                </div>
            </div>
        </div>

        {!! Form::close() !!}
@stop


@section('css')
    <link rel="stylesheet" href="/styles/barcode-create.css">
    <link rel="icon" href="/logo.jpg" type="image/jpeg">
@stop
