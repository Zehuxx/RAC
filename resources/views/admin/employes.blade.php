@extends('layouts.admin')
@section('route')
    <li class="breadcrumb-item">Admin</li>
    <li class="breadcrumb-item active">
        <a href="#">Empleados</a>
    </li>
@endsection

@section('cards')

    <table style="margin-bottom: 10px">
            <tr>
                <td style="text-align: left;">
                    <a class="btn btn-primary btn-add" href="{{ route('admin employees create') }}"></a>
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
                            <a class="btn btn-sm btn-outline-success mr-2" href="{{route('admin employees edit',$employee->id)}}">
                                <i class="fa fa-pencil-square-o"></i>
                            </a>

                            <form method="post" style="display: contents;" action="{{route('admin employees delete',$employee->id)}}">
                                @csrf
                                @method('DELETE')
                                <button type="submit"   class="btn btn-sm btn-outline-danger">
                                    <i class="fa fa-trash-o"></i>
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
