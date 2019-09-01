@extends('layouts.user')

@section('route')
    <li class="breadcrumb-item">User</li>
    <li class="breadcrumb-item active">
        <a href="#">Home</a>
    </li>

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
@foreach($cars as $car)
	<div class='col-lg-4 col-sm-6 col-md-4'>
		<div class='card'>
	  		<div class='card-header'>{{$car->car_brand->name. " / ". $car->model->name." / ". 1900}}
	    		<div class='card-header-actions'>
	      			<a class='card-header-action btn-minimize' href='#' data-toggle='collapse' data-target='#car{{$car->id}}' aria-expanded='true'>
	          			<i class='icon-arrow-up'></i>
	       			</a>
	        		<a class='card-header-action btn-close' href="#" data-id="{{$car->id}}">
	          			<i class='icon-close'></i>
	        		</a>
	      		</div>
	    	</div>
	    	<div class='collapse show' id='car{{$car->id}}'>
	    		<div class='card-body' style='padding:0px'>
	    			<img src="{{asset('img/carros/carro2.jpg')}}" style='width:100%'>
	    		</div>
	    		<div class='card-footer' style='padding: 0px'>
	    			<div class='btn-group btn-group-lg' role='group' aria-label='Large button group' style='width: 100%'>
	    				<a href="#{{$car->id}}" class='btn btn-info' style="border-radius: 0px">Detalles</a>
			            <a href="#{{$car->id}}" class='btn btn-success' style="border-radius: 0px">Nueva orden</a>
			        </div>
	    		</div>
	    	</div>
	    </div>
	</div>
@endforeach

</div>
<div class="col-lg-12 col-sm-12 col-md-12">
	{{ $cars->links() }}
<div>
@endsection

@section('div_principal')

@endsection

@section('js')
<script src="{{asset('js/user/user.js')}}"></script>
@endsection


