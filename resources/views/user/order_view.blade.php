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
<div class="col-lg-12 col-sm-12 col-md-12">
    <table style="margin-bottom: 10px">
        <tr>
            <td style="text-align: left;">
                <a class="btn btn-primary btn-add" href="{{route('order create')}}"></a>
            </td>
            <td>
                <form method="get">
                    <input type="text" id="search" value="{{ isset($search) ? $search : ''}}" autofocus="" name="search" placeholder="Buscar..." style="width: auto;">
                    <input type="submit" style="display: none" />
                </form>
            </td>
        </tr>
    </table>
</div>

<div class="card">
    <div class="card-header">
        <i class="fa fa-th-large"></i> Ordenes
    </div>
    <div class="card-body">
        @if(count($orders) > 0)
        <table class="table table-responsive-sm table-sm table-striped table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Cliente</th>
                    <th>Detalles</th>
                    <th>Costo</th>
                    <th>Fecha creación</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$order->customername}}</td>
                    <td><a href="{{route('details index',$order->id)}}">Mostrar</a></td>
                    <td>{{($order->cost===null) ? 0:$order->cost}}</td>
                    <td>{{$order->created_at}}</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <a class="btn btn-sm btn-outline-success mr-2" href="#"  type="submit">
                                <i class="fa fa-pencil-square-o"></i>
                            </a>

                            <form method="POST" action="#">
                                @csrf
                                @method('delete')
                                <button class="btn btn-sm btn-outline-danger" type="submit">
                                    <i class="fa fa-trash-o"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $orders->links() }}
        @else
            <h2>No se ha procesado ninguna orden</h2>
        @endif
    </div>
</div>
@endsection

@section('js')
@endsection


