@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-danger">ACTUALIZAR CONTRASEÑA</h1>
@stop

@section('content')
{!! Form::open(['route' => ['admin.user.update', $user->id], 'method' => 'PUT']) !!}
<div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-8 col-md-8">
                    <div class="form-group">
                        {{ Form::label('CONTRASEÑA NUEVA:', null, ['class' => 'control-label']) }}
                        {{ Form::text('name', $user->password, array_merge(['class' => 'form-control'])) }}
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
