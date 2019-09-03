@extends('layouts.user')

@section('route')
    <li class="breadcrumb-item">User</li>
    <li class="breadcrumb-item active">
        <a href="#">Orden</a>
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
                {{--<td style="text-align: left;">--}}
                {{--    <a class="btn btn-primary btn-add" href="#"></a>--}}
                {{--</td>--}}
                <td>
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
                <th>Tipo de orden</th>
                <th>Cliente</th>
                <th>Ingresada por</th>
                <th>Detalles</th>
                <th>Costo</th>
                <th>Fecha creación</th>
                <th>Acción</th>
            </tr>
            @foreach($orders as $order)
            <tr>
                <td>{{$order->ordertypename}}</td>
                <td>{{$order->customername}}</td>
                <td>{{$order->employeename}}</td>
                <td><a href="#{{$order->id}}">Mostrar</a></td>
                <td>{{$order->cost}}</td>
                <td>{{$order->created_at}}</td>
                <td>
                    <a class="btn-edit btn btn-success" href="#{{$order->id}}"></a>
                    <a class="btn-delete btn btn-danger" href="#{{$order->id}}"></a>
                </td>
            </tr>
            @endforeach
        </table>
        {{ $orders->links() }}
    </div>

@endsection

@section('js')
@endsection


