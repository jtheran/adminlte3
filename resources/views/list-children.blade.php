@extends('adminlte::page')

@section('content_header')
    <h1 class="m-0 text-danger">LISTAR</h1>
@stop

@section('content')
<div class="card">
    <!-- /.card-header -->
    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap table-hover table-success table-striped-columns border-danger">
            <thead>
                <tr class="bg-success text-white">
                    <th scope="col"><i class="fas fa-hashtag"></i></th>
                    <th scope="col"><i class="fas fa-user"></i> {{ __('NOMBRE') }}</th>
                    <th scope="col"><i class="fas fa-users"></i> {{ __('APELLIDOS') }}</th>
                    <th scope="col"><i class="fas fa-id-card"></i> {{ __('IDENTIFICACION') }}</th>
                    <th scope="col"><i class="fas fa-info-circle"></i> {{ __('TIPO DE IDENTIFICACION') }}</th>
                    <th scope="col"><i class="fas fa-hospital"></i> {{ __('EPS') }}</th>
                    <th scope="col"><i class="fas fa-home"></i> {{ __('DIRECCION') }}</th>
                    <th scope="col"><i class="fas fa-birthday-cake"></i> {{ __('EDAD') }}</th>
                    <th scope="col"><i class="fas fa-cogs"></i> {{ __('OPTIONS') }}</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">
                @foreach ($child as $items)
                    <tr>
                        <td>{{ $items->id }}</td>
                        <td>{{ $items->firstname }}</td>
                        <td>{{ $items->lastname}}</td>
                        <td>{{ $items->identification}}</td>
                        <td>{{ $items->identification_type}}</td>
                        <td>{{ $items->eps}}</td>
                        <td>{{ $items->address}}</td>
                        <td>{{ $items->age}}</td>
                        <td>
                            <div class="row">
                                {!! Form::open(['route' => ['admin.children.destroy', $items->id], 'method' => 'DELETE']) !!}
                                &nbsp;&nbsp;<button class="btn btn-sm btn-danger">
                                    <i class="nav-icon fas fa-trash-alt"></i>
                                </button>&nbsp;
                                {!! Form::close() !!}
                                <a href="{{ route('admin.children.edit', $items->id) }}"
                                    class="btn btn-sm btn-warning"><i class="nav-icon fas fa-edit"></i></a>

                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- /.card-body -->

    <div class="card-footer clearfix">
            {{ $child->render() }}
    </div>


    </div>
@stop


@section('css')
    <link rel="stylesheet" href="/styles/barcode-create.css">
    <link rel="icon" href="/logo.jpg" type="image/jpeg">
@stop
