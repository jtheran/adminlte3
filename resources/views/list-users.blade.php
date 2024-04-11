@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-danger">LISTA DE TRABAJADORES</h1>
@stop

@section('content')
<div class="card">
    <!-- /.card-header -->
    <div class="card-header">
        <div class="d-flex">
            <div class="col justify-content-start me-7">
                <input wire:model="search" class="form-control flex-grow-1" placeholder="Ingrese Data para Filtrar">
            </div>
            @can('admin.user.create')
                <div class="col justify-content-end">
                    <a href="{{ route('admin.user.create') }}" class="btn btn-success"><i class="fas fa-user"></i> NUEVO TRABAJADOR</a>
                </div>
            @endcan
        </div>
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap table-hover table-success table-striped-columns border-danger">
            <thead>
                <tr class="bg-success text-white">
                    <th scope="col"><i class="fas fa-hashtag"></i></th>
                    <th scope="col"><i class="fas fa-user"></i> {{ __('NOMBRE') }}</th>
                    <th scope="col"><i class="fas fa-birthday-cake"></i> {{ __('EDAD') }}</th>
                    <th scope="col"><i class="fas fa-id-card"></i> {{ __('IDENTIFICACION') }}</th>
                    <th scope="col"><i class="fas fa-info-circle"></i> {{ __('TIPO DE IDENTIFICACION') }}</th>
                    <th scope="col"><i class="fas fa-building"></i> {{ __('AREA/DEPARTAMENTO') }}</th>
                    <th scope="col"><i class="fas fa-briefcase"></i> {{ __('CARGO') }}</th>
                    <th scope="col"><i class="fas fa-address-book"></i> {{ __('CONTACTO') }}</th>
                    <th scope="col"><i class="fas fa-home"></i> {{ __('DIRECCION') }}</th>
                    <th scope="col"><i class="fas fa-cogs"></i> {{ __('OPTIONS') }}</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($user as $items)
                    <tr>
                        <td>{{ $items->id }}</td>
                        <td>{{ $items->name }}</td>
                        <td>{{ $items->age}}</td>
                        <td>{{ $items->identification}}</td>
                        <td>{{ $items->identification_type}}</td>
                        <td>{{ $items->area_department}}</td>
                        <td>{{ $items->position}}</td>
                        <td>{{ $items->contact}}</td>
                        <td>{{ $items->address}}</td>
                        <td>
                            <div class="row">
                                @can('admin.user.destroy')
                                    {!! Form::open(['route' => ['admin.user.destroy', $items->id], 'method' => 'DELETE']) !!}
                                    &nbsp;&nbsp;<button class="btn btn-sm btn-danger">
                                        <i class="nav-icon fas fa-trash-alt"></i>
                                    </button>&nbsp;
                                @endcan
                                @can('admin.user.edit')
                                    {!! Form::close() !!}
                                    <a href="{{ route('admin.user.edit', $items->id) }}"
                                        class="btn btn-sm btn-warning"><i class="nav-icon fas fa-edit"></i></a>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- /.card-body -->

    <div class="card-footer clearfix">
            {{ $user->render() }}
    </div>


    </div>
@stop


@section('css')
    <link rel="stylesheet" href="/styles/barcode-create.css">
    <link rel="icon" href="/logo.jpg" type="image/jpeg">
@stop