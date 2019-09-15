@extends('layouts.admin')
@section('route')
    <li class="breadcrumb-item">Admin</li>
    <li class="breadcrumb-item active">
        <a href="#">Home</a>
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
        <i class="fa fa-align-justify"></i> Empleados
    </div>
    
    <div class="card-body">
        <br>
        <table class="table table-striped table-hover">
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
                      <a class="btn-edit btn btn-success" href="{{route('admin employees edit',$employee->id)}}"></a>
                      <form method="post" style="display: contents;" action="{{route('admin employees delete',$employee->id)}}">
                        @csrf
                        @method('DELETE')
                        <button type="submit"   class="btn-delete btn btn-danger"></ button>
                      </form>
                    </td>
                  </tr>
                @endforeach
            </tbody>
        </table>
        {{$employees->links()}}
    </div>
  </div>
@endsection
