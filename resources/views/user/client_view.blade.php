@extends('layouts.user')

@section('route')
    <li class="breadcrumb-item">User</li>
    <li class="breadcrumb-item active">
        <a href="#">Clientes</a>
    </li>

@endsection

@section('cards')
<table style="margin-bottom: 10px">
    <tr>
        <td style="text-align: left;">
            <a class="btn btn-primary btn-add " href="{{ route('user clients add') }}"></a>
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
        <i class="fa fa-user-o"></i> Clientes
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
                @foreach ($clients as $client)
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
                                <a class="btn btn-sm btn-outline-success mr-2" href="{{ route('user clients edit', $client->id) }}"  type="submit">
                                    <i class="fa fa-pencil-square-o"></i>
                                </a>

                                <form method="POST" action="{{ route('user clients delete', $client->id) }}">
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
        {{$clients->links()}}

    </div>
</div>

@endsection

@section('js')
@endsection


