@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-danger">EDITAR USUARIO</h1>
@stop

@section('content')
{!! Form::open(['route' => ['admin.user.update', $user->id], 'method' => 'PUT']) !!}
<div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-8 col-md-8">
                    <div class="form-group">
                        {{ Form::label('NOMBRE:', null, ['class' => 'control-label']) }}
                        {{ Form::text('name', $user->name, array_merge(['class' => 'form-control'])) }}
                    </div>
                </div>
                <div class="col-8 col-md-8">
                    <div class="form-group">
                            {{ Form::label('EDAD:', null, ['class' => 'control-label']) }}
                            {{ Form::text('age', $user->age, array_merge(['class' => 'form-control'])) }}
                    </div>
                </div>
                <div class="col-8 col-md-8">
                    <div class="form-group">
                            {{ Form::label('IDENTIFICACION:', null, ['class' => 'control-label']) }}
                            {{ Form::text('identification', $user->identification, array_merge(['class' => 'form-control'])) }}
                    </div>
                </div>
                <div class="col-8 col-md-8">
                    <div class="form-group">
                            {{ Form::label('TIPO DE IDENTIFICACION:', null, ['class' => 'control-label']) }}
                            {{ Form::select('identification_type', array('cedula de ciudadania' => 'Cedula de Ciudadania', 'tarjeta de identidad' => 'Tarjeta de Identidad', 'registro civil' => 'Registro Civil'), $user->identification_type, ['class' => 'form-control']) }}
                    </div>
                </div>
                <div class="col-8 col-md-8">
                    <div class="form-group">
                            {{ Form::label('DEPARTAMENTO/AREA:', null, ['class' => 'control-label']) }}
                            {{ Form::text('area_department', $user->area_department, array_merge(['class' => 'form-control'])) }}
                    </div>
                </div>
                <div class="col-8 col-md-8">
                    <div class="form-group">
                            {{ Form::label('CARGO:', null, ['class' => 'control-label']) }}
                            {{ Form::text('position', $user->position, array_merge(['class' => 'form-control'])) }}
                    </div>
                </div>
                <div class="col-8 col-md-8">
                    <div class="form-group">
                            {{ Form::label('CONTACTO:', null, ['class' => 'control-label']) }}
                            {{ Form::text('contact', $user->contact, array_merge(['class' => 'form-control'])) }}
                    </div>
                </div>
                <div class="col-8 col-md-8">
                    <div class="form-group">
                            {{ Form::label('DIRECCION:', null, ['class' => 'control-label']) }}
                            {{ Form::text('address', $user->address, array_merge(['class' => 'form-control'])) }}
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
