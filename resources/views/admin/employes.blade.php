@extends('layouts.admin')

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
        <table class="table table-responsive-sm table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Nusuario</th>
                    <th>Rol</th>
                    <th>Estado</th>
                    <th>Comision</th>
                    <th>Meta</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Denis</td>
                    <td>Henriquez</td>
                    <td>hdenis</td>
                    <td>Asistente</td>
                    <td>A</td>
                    <td>.80</td>
                    <td>300000</td>
                    <td>
                        <span class="badge badge-success">Active</span>
                    </td>
                </tr>
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
