@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-danger">EDITAR USUARIO</h1>
@stop

@section('content')
{!! Form::open(['route' => ['admin.user.store'], 'method' => 'POST']) !!}
<div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-8 col-md-8">
                    <div class="form-group">
                        {{ Form::label('NOMBRE:', null, ['class' => 'control-label']) }}
                        {{ Form::text('name', "", array_merge(['class' => 'form-control'])) }}
                    </div>
                </div>
                <div class="col-8 col-md-8">
                    <div class="form-group">
                            {{ Form::label('EMAIL:', null, ['class' => 'control-label']) }}
                            {{ Form::text('email', "", array_merge(['class' => 'form-control'])) }}
                    </div>
                </div>
                <div class="col-8 col-md-8">
                    <div class="form-group">
                            {{ Form::label('PASSWORD:', null, ['class' => 'control-label']) }}
                            {{ Form::password('password', (['id' => 'password', 'class' => 'form-control'])) }}
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
                            {{ Form::label('DEPARTAMENTO/AREA:', null, ['class' => 'control-label']) }}
                            {{ Form::text('area_department', "", array_merge(['class' => 'form-control'])) }}
                    </div>
                </div>
                <div class="col-8 col-md-8">
                    <div class="form-group">
                            {{ Form::label('CARGO:', null, ['class' => 'control-label']) }}
                            {{ Form::text('position', "", array_merge(['class' => 'form-control'])) }}
                    </div>
                </div>
                <div class="col-8 col-md-8">
                    <div class="form-group">
                            {{ Form::label('CONTACTO:', null, ['class' => 'control-label']) }}
                            {{ Form::text('contact', "", array_merge(['class' => 'form-control'])) }}
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
                    <a href="{{ route('admin.user.index') }}" class="btn btn-outline-danger"> Cancelar</a>
                    <button type="submit" class="btn btn-success" >Guardar</button>
                </div>
            </div>
</div>

        {!! Form::close() !!}
@stop


@section('css')
    <link rel="icon" href="/logo.jpg" type="image/jpeg">
@stop
