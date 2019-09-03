@extends('layouts.user')

@section('route')
    <li class="breadcrumb-item">User</li>
    <li class="breadcrumb-item">Orden</li>
    <li class="breadcrumb-item active">
        <a href="#">Detalles</a>
    </li>

@endsection

@section('css')
<style type="text/css">
	
</style>
@endsection

@section('cards')
<div class='row'>
    <div class="col-lg-12 col-sm-12 col-md-12">
        <table style="margin-bottom: 10px"> 
            <tr>
                <td style="text-align: left;">
                    <a class="btn btn-primary btn-add" href="#"></a>
                </td>
                <td >
                    <form method="get">
                        <input type="text" id="search" value="{{ isset($search) ? $search : ''}}" autofocus="" name="search" placeholder="Buscar..." style="width: auto;">
                        <input type="submit" style="display: none" />
                    </form>
                </td>
            </tr>
        </table>
    </div>
    <div class="col-lg-12 col-sm-12 col-md-12">
        <table class="table  table-striped table-hover">
            <tr>
                <th>Información carro</th>
                <th>Fecha Salida</th>
                <th>Fecha Reingreso</th>
                <th>Acción</th>
            </tr>
            @foreach($details as $detail)
            <tr>
                <td><a href="#{{$detail->car_id}}">Informacion</a></td>
                <td>{{$detail->departure_date}}</td>
                <td>{{$detail->reentry_date}}</td>
                <td>
                    <a class="btn-edit btn btn-success" href="#{{$detail->id}}"></a>
                    <a class="btn-delete btn btn-danger" href="#{{$detail->id}}"></a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>

@endsection

@section('js')
@endsection


