@extends('layouts.users')

@section('sidebar elements')
    <li class="nav-title">Bienvenido</li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin employes') }}">
            <i class="nav-icon icon-people"></i> Empleados</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin models') }}">
            <i class="nav-icon icon-list"></i> Modelos</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('admin types') }}">
            <i class="nav-icon icon-grid"></i> Tipos</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="colors.html">
            <i class="nav-icon icon-note"></i> Reportes</a>
    </li>
@endsection

@section('route')
@endsection

@section('div_principal')
@endsection
