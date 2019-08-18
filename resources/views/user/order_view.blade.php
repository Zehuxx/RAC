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
<input type='button' value='Nueva orden'>
<table>
    <tr>
    <th>tipo de orden</th>
    <th>carro</th>
    <th>ingresada por</th>
    <th>cliente</th>
    <th>fecha registro</th>
    <th>fecha reingreso<th>
    <th>editar</th>
    <th>eliminar</th>
    </tr>
</table>
@endsection

@section('js')
@endsection


