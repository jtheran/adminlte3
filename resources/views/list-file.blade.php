@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-danger">LISTA DE ARCHIVOS</h1>
@stop

@section('content')
<div class="card">
    <!-- /.card-header -->
    <div class="card-header">
        <div class="d-flex">
            <div class="col justify-content-start me-7">
                <input wire:model="search" class="form-control flex-grow-1" placeholder="Ingrese Data para Filtrar">
            </div>
                <div class="col justify-content-end">
                    <a href="{{ route('admin.file.create') }}" class="btn btn-success"><i class="fas fa-plus"></i></a>
                </div>
        </div>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap table-hover table-success table-striped-columns border-danger">
            <thead>
                <tr class="bg-success text-white">
                    <th scope="col"><i class="fas fa-hashtag"></i></th>
                    <th scope="col"><i class="fas fa-file"></i> {{ __('NOMBRE') }}</th>
                    <th scope="col"><i class="fas fa-road"></i> {{ __('RUTA') }}</th>
                    <th scope="col"><i class="fas fa-weight-hanging"></i> {{ __('TAMAÑO') }}</th>
                    <th scope="col"><i class="fas fa-cogs"></i> {{ __('OPCIONES') }}</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($files as $items)
                    <tr>
                        <td>{{ $items->id }}</td>
                        <td>{{ $items->name }}</td>
                        <td>{{ $items->path}}</td>
                        <td>{{ $items->size}}</td>
                        <td>
                            <div class="row">
                                    {!! Form::open(['route' => ['admin.file.destroy', $items->id], 'method' => 'DELETE']) !!}
                                    &nbsp;&nbsp;<button class="btn btn-sm btn-danger">
                                        <i class="nav-icon fas fa-trash-alt"></i>
                                    </button>&nbsp;
                                    {!! Form::close() !!}
                                    <a href="{{ route('admin.file.show', $items->id) }}"
                                        class="btn btn-sm btn-primary"><i class="nav-icon fas fa-download"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- /.card-body -->

    </div>
@stop


@section('css')
    <link rel="icon" href="/logo.jpg" type="image/jpeg">
@stop
