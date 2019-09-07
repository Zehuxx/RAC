@extends('layouts.admin')

@section('route')
    <li class="breadcrumb-item">Admin</li>
    <li class="breadcrumb-item active">
        <a href="#">Modelos</a>
    </li>
@endsection

@section('cards')
<div class="card">
    <div class="card-header">
        <i class="fa fa-car"></i> Modelos
        <div class="card-header-actions">
            <a class="card-header-action" href="{{ route('admin models add') }}">
                <i class="icon-plus"></i>
            </a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-responsive-sm table-sm table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Modelo</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($models as $model)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $model->name }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <form method="POST" action="{{ route('admin models delete', $model->id) }}">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-sm btn-outline-danger mr-2" type="submit">
                                        <i class="fa fa-trash-o"></i>
                                    </button>
                                </form>

                                <form method="GET" action="{{ route('admin employees edit', $model->id) }}">
                                    @csrf
                                    <button class="btn btn-sm btn-outline-primary" type="submit">
                                        <i class="fa fa-pencil-square-o"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <p>No Hay ningún modelo</p>
                @endforelse

            </tbody>
        </table>

        {{$models->links()}}
    </div>
  </div>
@endsection
