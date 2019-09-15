@extends('layouts.admin')

@section('route')
    <li class="breadcrumb-item">Admin</li>
    <li class="breadcrumb-item active">
        <a href="#">Marcas</a>
    </li>
@endsection

@section('cards')
<table style="margin-bottom: 10px">
    <tr>
        <td style="text-align: left;">
            <a class="btn btn-primary btn-add " href="{{ route('admin brands add') }}"></a>
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
        <i class="fa fa-car"></i> Marcas
    </div>
    <div class="card-body">
        @if( count($brands) > 0 )
        <table class="table table-responsive-sm table-sm table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Marca</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $brands as $brand )
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $brand->name }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a class="btn btn-sm btn-outline-success mr-2" href="{{ route('admin brands edit', $brand->id) }}"  type="submit">
                                    <i class="fa fa-pencil-square-o"></i>
                                </a>

                                <form method="POST" action="{{ route('admin brands delete', $brand->id) }}">
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
        {{$brands->links()}}
        @else
            <h2>No existe ningúna marca registrada</h2>
        @endif
    </div>
  </div>
@endsection
