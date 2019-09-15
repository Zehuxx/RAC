@extends('layouts.admin')

@section('route')
    <li class="breadcrumb-item">Admin</li>
    <li class="breadcrumb-item active">
        <a href="#">Tipos</a>
    </li>
@endsection

@section('cards')
<table style="margin-bottom: 10px">
    <tr>
        <td style="text-align: left;">
            <a class="btn btn-primary btn-add " href="{{ route('admin types add') }}"></a>
        </td>
        <td >
            <form method="get">
                <input type="text" id="search" value="{{ isset($search) ? $search : ''}}" autofocus="" name="search" placeholder="Filtrar..." style="width: auto;">
                <input type="submit" style="display: none" />
            </form>
        </td>
    </tr>
</table>

<div class="card">
    <div class="card-header">
        <i class="fa fa-car"></i> Tipos
    </div>
    <div class="card-body">
        @if (count($carTypes) > 0)
        <table class="table table-responsive-sm table-striped table-condensed table-sm table-hover">
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
                                <a class="btn btn-sm btn-outline-success mr-2" href="{{ route('admin types edit', $carType->id) }}"  type="submit">
                                    <i class="fa fa-pencil-square-o"></i>
                                </a>

                                <form method="POST" action="{{ route('admin types delete', $carType->id) }}">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-sm btn-outline-danger" type="submit">
                                        <i class="fa fa-trash-o"></i>
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
            <h2>No existe ningun tipo de automovil</h2>
        @endif

    </div>
  </div>
@endsection
