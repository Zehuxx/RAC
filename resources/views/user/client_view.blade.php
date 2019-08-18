@extends('layouts.user')

@section('route')
    <li class="breadcrumb-item">User</li>
    <li class="breadcrumb-item"><!--<a href="{{route('user home')}}"></a>-->Home</li>
    <li class="breadcrumb-item active">
        <a href="#">Nueva orden</a>
    </li>

@endsection

@section('css')
<style type="text/css">
	table th{
		text-align: left;
	}
</style>
@endsection

@section('cards')
<input type='button' value='Agregar cliente'>
<table>
    <tr>
    <th>nombre</th>
    <th>identidad</th>
    <th>direccion</th>
    <th>fecha registro</th>
    <th>editar</th>
    <th>eliminar</th>
    </tr>
</table>
@endsection

@section('js')
@endsection


