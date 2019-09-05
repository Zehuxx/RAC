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
	body .modal-dialog { /* Width */
    max-width: 100%;
    width: auto !important;
    }
    .modal {
    z-index: -1;
    display: flex !important;
    justify-content: center;
    align-items: center;
    }

    .modal-open .modal {
       z-index: 1050;
    }
    .modal-body {
       padding: 0rem;
    }
</style>
@endsection

@section('cards')
<div class='row'>
    <div class="col-lg-12 col-sm-12 col-md-12">
        <table style="margin-bottom: 10px"> 
            <tr>
                <td style="text-align: left;">
                    <a class="btn btn-primary btn-add" href="{{route('user home',['orden'=>Route::current()->parameters['id_orden']])}}"></a>
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
                <th>Imagen carro</th>
                <th>Placa</th>
                <th>Año</th>
                <th>Ubicación</th>
                <th>Fecha Salida</th>
                <th>Fecha Reeingreso</th>
                <th>Movimiento</th>
                <th>Acción</th>
            </tr>
            @foreach($details as $detail)
            <tr>
                <td class="car" style="cursor: pointer;"><img src="{{asset('img/carros/'.$detail->imagen)}}" style="max-width: 100px;max-height: 50px;"></td>
                <td>{{$detail->placa}}</td>
                <td>{{date_format(date_create($detail->year),"Y")}}</td>
                <td>{{$detail->ubicacion}}</td>
                <td>{{$detail->departure_date}}</td>
                <td>{{$detail->reentry_date}}</td>
                <td>{{$detail->movimiento}}</td>
                <td>
                    <a class="btn-edit btn btn-success" href="#{{$detail->id}}"></a>
                    <a class="btn-delete btn btn-danger" href="#{{$detail->id}}"></a>
                </td>
            </tr>
            @endforeach
        </table>
    </div>

@endsection

@section('div_principal')
<div class="modal fade"  id="imagen-carro" tabindex="-1" role="dialog" aria-labelledby="ImagenCarro" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-body">
                <img src="" id="imagen_car" style="max-width: 700px">
            </div>
        </div>
    </div>
@endsection


@section('js')
<script type="text/javascript">
    $(".table .car").click(function(event) {
        $('#imagen_car').attr('src',$(this).find('img').attr('src'));
        $("#imagen-carro").modal("show");
    });
</script>
@endsection


