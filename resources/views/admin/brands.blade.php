@extends('layouts.admin')

@section('route')
    <li class="breadcrumb-item">Admin</li>
    <li class="breadcrumb-item active">
        <a href="#">Marcas</a>
    </li>
@endsection

@section('cards')
<div class="card">
    <div class="card-header">
        <i class="fa fa-car"></i> Marcas
        <div class="card-header-actions">
            <a class="card-header-action" href="{{ route('admin brands add') }}">
                <i class="icon-plus"></i>
            </a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-responsive-sm table-sm table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Marca</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($brands as $brand)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $brand->name }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <form method="POST" action="{{ route('admin brands delete', $brand->id) }}">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-sm btn-outline-danger mr-2" type="submit">
                                        <i class="fa fa-trash-o"></i>
                                    </button>
                                </form>

                                <form method="GET" action="{{ route('admin brands edit', $brand->id) }}">
                                    @csrf
                                    <button class="btn btn-sm btn-outline-primary" type="submit">
                                        <i class="fa fa-pencil-square-o"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <p>No hay ningúna marca</p>
                @endforelse

            </tbody>
        </table>

        {{$brands->links()}}
    </div>
  </div>
@endsection
