@extends('layouts.user')

@section('route')
    <li class="breadcrumb-item">User</li>
    <li class="breadcrumb-item active">
        <a href="#">Clientes</a>
    </li>

@endsection

@section('cards')
<div class="card">
    <div class="card-header">
        <i class="fa fa-user-o"></i> Clientes
        <div class="card-header-actions">
            <a class="card-header-action" href="{{ route('user clients add') }}">
                <i class="icon-plus"></i>
            </a>
        </div>
    </div>
    <div class="card-body">
        <table class="table table-responsive-sm table-sm table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Identidad</th>
                    <th>Direccion</th>
                    <th>Phone</th>
                    <th>Fecha nacimiento</th>
                    <th>Genero</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($clients as $client)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->last_name }}</td>
                        <td>{{ $client->identification_card }}</td>
                        <td>{{ $client->home_address }}</td>
                        <td>{{ $client->phone }}</td>
                        <td>{{ \Carbon\Carbon::parse($client->birth_date)->format('Y-m-d') }}</td>
                        <td>{{ $client->gender }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <form method="POST" action="{{ route('user clients delete', $client->id) }}">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-sm btn-outline-danger mr-2" type="submit">
                                        <i class="fa fa-trash-o"></i>
                                    </button>
                                </form>

                                <form method="GET" action="{{ route('user clients edit', $client->id) }}">
                                    @csrf
                                    <button class="btn btn-sm btn-outline-primary" type="submit">
                                        <i class="fa fa-pencil-square-o"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <p>No hay clientes registrados</p>
                @endforelse

            </tbody>
        </table>
        {{$clients->links()}}

    </div>
  </div>

@endsection

@section('js')
@endsection


