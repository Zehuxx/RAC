
{{-- plantilla para los usuarios normales --}}
@extends('layouts.users')

@section('sidebar elements')
    <li class="nav-title">Bienvenido</li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('home')}}">
            <i class="nav-icon icon-list"></i> Carros</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('order index')}}">
            <i class="nav-icon icon-grid"></i> Ordenes</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('user clients')}}">
            <i class="nav-icon icon-people"></i> Clientes</a>
    </li>
@endsection

@section('route')
@endsection

@section('div_principal')

@endsection
