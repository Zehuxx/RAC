@extends('layouts.admin')

@if (session('status')=='created')
<script>
    function myFunction() {
      alert("Empleado creado");
    }

    myFunction();
    </script>
@endif

@section('route')
    <li class="breadcrumb-item">Admin</li>
    <li class="breadcrumb-item active">
        <a href="#">Home</a>
    </li>
@endsection

@section('cards')
<div class="card">
    <div class="card-header">
        <i class="fa fa-align-justify"></i> Empleados
        <div class="card-header-actions">
            <a class="card-header-action btn-setting" href="{{ route('admin employes add') }}">
                <i class="icon-plus"></i>
            </a>
        </div>
    </div>
    <div class="card-body">
        <form action="/empleados/add">
        <input type="submit" value="agregar"/>
        </form>
        <br>
        <table class="table table-responsive-sm table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Rol</th>
                    <th>Comision</th>
                    <th>Meta</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                
                  @foreach ($employees as $emp)
                  <tr>
                  <td>{{$emp->id}}</td>
                  <td>{{$emp->name}}</td>
                  <td>{{$emp->last_name}}</td>
                  <td>{{$emp->rl}}</td>
                  <td>{{$emp->cm}}</td>
                  <td>{{$emp->sg}}</td>
                  <td>
                      <span class="badge badge-success">Active</span>
                      <input type="button" value="editar">
                      <input type="button" value="borrar">
                  </td> 
                </tr>
                  @endforeach
                
            </tbody>
        </table>

      <ul class="pagination">
        <li class="page-item">
          <a class="page-link" href="#">Prev</a>
        </li>
        <li class="page-item active">
          <a class="page-link" href="#">1</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">2</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">3</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">4</a>
        </li>
        <li class="page-item">
          <a class="page-link" href="#">Next</a>
        </li>
      </ul>
    </div>
  </div>
@endsection
