@extends('layouts.users')

@section('sidebar elements')
    <li class="nav-title">Bienvenido</li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin home')}}">
            <i class="nav-icon icon-map"></i> Empleados</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="index.html">
            <i class="nav-icon icon-map"></i> Modelos</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="colors.html">
            <i class="nav-icon icon-people"></i> Tipos</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="colors.html">
            <i class="nav-icon icon-people"></i> Reportes</a>
    </li>
@endsection

@section('route')
@endsection

@section('div_principal')
@endsection