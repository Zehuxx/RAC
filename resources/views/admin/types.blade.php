@extends('layouts.admin')

@section('route')
    <li class="breadcrumb-item">Admin</li>
    <li class="breadcrumb-item active">
        <a href="#">Tipos</a>
    </li>
@endsection

@section('cards')
<div class="card">
    <div class="card-header">
        <i class="fa fa-car"></i> Tipos
        <div class="card-header-actions">
            <a class="card-header-action btn-setting" href="{{ route('admin types add') }}">
                <i class="icon-plus"></i>
            </a>
        </div>
    </div>
    <div class="card-body">
        @if (count($carTypes) > 0)
        <table class="table table-responsive-sm table-striped table-condensed table-sm">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Tipo</th>
                    <th>Costo</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($carTypes as $carType)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $carType->name }}</td>
                        <td>{{ $carType->cost }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <form method="POST" action="{{ route('admin types delete', $carType->id) }}">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-sm btn-outline-danger mr-2" type="submit">
                                        <i class="fa fa-trash-o"></i>
                                    </button>
                                </form>

                                <form method="GET" action="{{ route('admin types edit', $carType->id) }}">
                                    @csrf
                                    <button class="btn btn-sm btn-outline-primary" type="submit">
                                        <i class="fa fa-pencil-square-o"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        {{$carTypes->links()}}
        @else
            <p>No existe ningun tipo de automovil</p>
        @endif

    </div>
  </div>
@endsection
