@extends('layouts.admin')

@section('route')
    <li class="breadcrumb-item">Admin</li>
    <li class="breadcrumb-item active">
        <a href="#">Modelos</a>
    </li>
@endsection

@section('cards')

<table style="margin-bottom: 10px">
    <tr>
        <td style="text-align: left;">
            <a class="btn btn-primary btn-add " href="{{ route('admin groups add') }}"></a>
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
        <i class="fa fa-money"></i> Grupos de comisión
    </div>
    <div class="card-body">
        @if( count($groups) > 0 )
        <table class="table table-responsive-sm table-sm table-hover table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Grupo</th>
                    <th>Tipo de auto</th>
                    <th>Comisión</th>
                    <th>Meta</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($groups as $group)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $group->name }}</td>
                        <td>{{ $group->car_type->name }}</td>
                        <td>{{ $group->commission }}</td>
                        <td>{{ $group->sale_goal }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a class="btn btn-sm btn-outline-primary mr-2" href="{{ route('admin groups show', $group->id) }}"  type="submit">
                                    <i class="fa fa-eye"></i>
                                </a>
                                <a class="btn btn-sm btn-outline-success mr-2" href="{{ route('admin groups edit', $group->id) }}"  type="submit">
                                    <i class="fa fa-pencil-square-o"></i>
                                </a>

                                <form method="POST" action="{{ route('admin groups delete', $group->id) }}">
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
        {{$groups->links()}}
        @else
            <h2>No existe ningún modelo</h2>
        @endif
    </div>
  </div>
@endsection
