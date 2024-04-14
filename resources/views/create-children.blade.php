@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-danger">CREAR NIÑO</h1>
@stop

@section('content')
{!! Form::open(['route' => ['admin.children.store'], 'method' => 'POST']) !!}
<div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-8 col-md-8">
                    <div class="form-group">
                        {{ Form::label('NOMBRE:', null, ['class' => 'control-label']) }}
                        {{ Form::text('firstname',"",array_merge(['class' => 'form-control'])) }}
                    </div>
                </div>
                <div class="col-8 col-md-8">
                    <div class="form-group">
                            {{ Form::label('APELLIDO:', null, ['class' => 'control-label']) }}
                            {{ Form::text('lastname', "",array_merge(['class' => 'form-control'])) }}
                    </div>
                </div>
                <div class="col-8 col-md-8">
                    <div class="form-group">
                            {{ Form::label('EDAD:', null, ['class' => 'control-label']) }}
                            {{ Form::text('age', "", array_merge(['class' => 'form-control'])) }}
                    </div>
                </div>
                <div class="col-8 col-md-8">
                    <div class="form-group">
                            {{ Form::label('IDENTIFICACION:', null, ['class' => 'control-label']) }}
                            {{ Form::text('identification', "", array_merge(['class' => 'form-control'])) }}
                    </div>
                </div>
                <div class="col-8 col-md-8">
                    <div class="form-group">
                            {{ Form::label('TIPO DE IDENTIFICACION:', null, ['class' => 'control-label']) }}
                            {{ Form::select('identification_type', array('cedula de ciudadania' => 'Cedula de Ciudadania', 'tarjeta de identidad' => 'Tarjeta de Identidad', 'registro civil' => 'Registro Civil'), "", ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="col-8 col-md-8">
                    <div class="form-group">
                            {{ Form::label('EMPRESA PRESTADORA DE SALUD:', null, ['class' => 'control-label']) }}
                            {{ Form::text('eps', "", array_merge(['class' => 'form-control'])) }}
                    </div>
                </div>
                <div class="col-8 col-md-8">
                    <div class="form-group">
                            {{ Form::label('DIRECCION:', null, ['class' => 'control-label']) }}
                            {{ Form::text('address', "", array_merge(['class' => 'form-control'])) }}
                    </div>
                </div>
            </div>
        </div>
</div>

<div class="row">
            <div class="col-8">
                <div class="float-right">
                    <a href="{{ route('admin.children.index') }}" class="btn btn-outline-danger"> Cancelar</a>
                    <button type="submit" class="btn btn-success" >CREAR</button>
                </div>
            </div>
        </div>

        {!! Form::close() !!}
@stop


@section('css')
    <link rel="icon" href="/logo.jpg" type="image/jpeg">
@stop
