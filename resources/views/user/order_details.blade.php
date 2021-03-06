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
    <div class="col-lg-12 col-sm-12 col-md-12" style="padding-right: 0px;padding-left: 0px">
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
<div class="card">
    <div class="card-header">
        <i class="fa fa-list"></i> Detalles
    </div>
    <div class="card-body">
        @if(count($details) > 0)
        <table class="table table-sm table-striped table-hover">
            <thead>
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
            </thead>
            <tbody>
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
                            <a class="btn btn-sm btn-outline-danger" data-order="{{Route::current()->parameters['id_orden']}}" data-id="{{$detail->id}}" href="#"><i class="fa fa-trash-o"></i></a>
                           {{--  <form method="post" action="{{ route('detail destroy',['id_orden'=>Route::current()->parameters['id_orden'],'id_detalle'=>$detail->id]) }}">
                                   @csrf--}}
                            {{--        @method('DELETE')--}}
                            {{--        <button type="submit" class="btn-delete btn btn-danger"></button>--}}
                            {{--</form>--}}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $details->links() }}
        @else
            <h3>
                Agregue un detalle.
            </h3>
            <a href=""></a>
        @endif
    </div>
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
<script src="{{asset('js/user/details.js')}}"></script>
<script type="text/javascript">
    $(".table .car").click(function(event) {
        $('#imagen_car').attr('src',$(this).find('img').attr('src'));
        $("#imagen-carro").modal("show");
    });
</script>
@endsection


