@extends('layouts.admin')

@section('route')
    <li class="breadcrumb-item">Admin</li>
    <li class="breadcrumb-item">Groups</li>
    <li class="breadcrumb-item active">
        <a href="#">Show</a>
    </li>
@endsection

@section('cards')

<div class="card">
    <div class="card-header">
        <i class="fa fa-info"></i>Información
    </div>
    <div class="card-body">
        <table class="table table-responsive-sm table-sm table-hover table-striped">
            <tr>
                <th>Grupo: </th>
                <td>{{ $group->name }}</td>
            </tr>
            <tr>
                <th>Tipo de auto: </th>
                <td>{{ $group->car_type->name }}</td>
            </tr>
            <tr>
                <th>Comisión: </th>
                <td>{{ $group->commission }}</td>
            </tr>
            <tr>
                <th>Meta: </th>
                <td>{{ $group->sale_goal }}</td>
            </tr>
        </table>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <i class="fa fa-user"></i> Integrantes
    </div>
    <div class="card-body">

        @if( count($members) > 0 )
        <table class="table table-responsive-sm table-sm table-striped table-hover">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Rol</th>
                    <th>email</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
                @foreach($members as $member)
                    <tr>
                        <td>{{$member->nombre.' '.$member->apellido}}</td>
                        <td>{{$member->rol}}</td>
                        <td>{{$member->email}}</td>
                        <td>
                            <a class="btn btn-sm btn-outline-danger" href="{{ route('admin groups remove employee', $member->sale_goal) }}"  type="submit">
                                <i class="fa fa-close"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$members->links()}}
        @else
            <h2>No existe ningún empleado registrado</h2>
        @endif

    </div>
</div>

<div class="card">
    <div class="card-header">
        <i class="fa fa-user"></i> Empleados
    </div>

    <div class="card-body">
        @if( count($employees) > 0 )
        <table class="table table-responsive-sm table-sm table-striped table-hover">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Rol</th>
                    <th>email</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                    <tr>
                        <td>{{$employee->nombre.' '.$employee->apellido}}</td>
                        <td>{{$employee->rol}}</td>
                        <td>{{$employee->email}}</td>
                        <td>
                            <form method="post" style="display: contents;" action="{{route('admin groups add employee',$employee->id)}}">
                                @csrf
                                <input type="hidden" name="group" id="group" value="{{ $group->id }}">
                                <button type="submit"   class="btn btn-sm btn-outline-primary">
                                    <i class="fa fa-plus"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{$employees->links()}}
        @else
            <h2>No existe ningún empleado registrado</h2>
        @endif
    </div>
</div>

@endsection
