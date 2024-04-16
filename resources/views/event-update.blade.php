@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-danger">EDITAR CITA</h1>
@stop

@section('content')
{!! Form::open(['route' => ['admin.event.update', $event->id], 'method' => 'PUT']) !!}
<div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-8 col-md-8">
                    <div class="form-group">
                        {{ Form::label('TITULO:', null, ['class' => 'control-label']) }}
                        {{ Form::text('title', $event->event, array_merge(['class' => 'form-control'])) }}
                    </div>
                </div>
                <div class="col-8 col-md-8">
                    <div class="form-group">
                            {{ Form::label('HORA DE INICIO:', null, ['class' => 'control-label']) }}
                            {{ Form::text('start_date', $event->start_date, array_merge(['class' => 'form-control'])) }}
                    </div>
                </div>
                <div class="col-8 col-md-8">
                    <div class="form-group">
                            {{ Form::label('HORA DE FINALIZACION:', null, ['class' => 'control-label']) }}
                            {{ Form::text('end_date', $event->end_date, array_merge(['class' => 'form-control'])) }}
                    </div>
                </div>
                <div class="col-8 col-md-8">
                    <div class="form-group">
                            {{ Form::label('DESCRIPCION:', null, ['class' => 'control-label']) }}
                            {{ Form::text('description', $event->description, array_merge(['class' => 'form-control'])) }}
                    </div>
                </div>
            </div>
        </div>
</div>

<div class="row">
            <div class="col-8">
                <div class="float-right">
                    <a href="{{ route('admin.event.calendar') }}" class="btn btn-outline-danger"> Cancelar</a>
                    <button type="submit" class="btn btn-success" >Guardar</button>
                </div>
            </div>
</div>

        {!! Form::close() !!}
@stop


@section('css')
    <link rel="icon" href="/logo.jpg" type="image/jpeg">
@stop
