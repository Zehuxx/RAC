@extends('layouts.user')

@section('route')
    <li class="breadcrumb-item">User</li>
    <li class="breadcrumb-item">Detalles</li>
    <li class="breadcrumb-item"><!--<a href="{{route('user home')}}"></a>-->Home</li>
    <li class="breadcrumb-item active">
        <a href="#">Informacion</a>
    </li>

@endsection


@section('cards') 
<div class="row">
	<div class="col-lg-6 col-md-6">
	    <div class="card">
	    	<div class="card-header">
	        	<i class="fa fa-info-circle"></i> Detalles
	        </div>
	        <div class="card-body">
	        	<table class="table  table-striped table-hover">
	        	  <tbody>
	        	    <tr>
	        	    	<th>Marca</th>
	        	    	<td>
	        	    		<input type="text" disabled="disabled" value="{{$marca->name}}">
						</td>
	        	    </tr>
	        	    <tr>
	        	    	<th>Modelo</th>
	        	    	<td>
	        	    		<input type="text" disabled="disabled" value="{{$modelo->name}}">
						</td>
	        	    </tr>
	        	    <tr>
	        	    	<th>Chasis</th>
	        	    	<td>
	        	    		<input disabled="disabled" class="form-control" type="text" value="{{ $carro->chassis }}">
	        	    	</td>
	        	    </tr>
	        	    <tr>
	        	    	<th>Placa</th>
	        	    	<td>
	        	    		<input disabled="disabled" class="form-control" type="text" value="{{ $carro->license_plate }}">
	        	    	</td>
	        	    </tr>
	        	    <tr>
	        	    	<th>Tipo</th>
	        	    	<td>
	        	    		<input disabled="disabled" class="form-control" type="text" value="{{ $tipo->name}}">
	        	    	</td>
	        	    </tr>
	        	    <tr>
	        	    	<th>Estado</th>
	        	    	<td>
	        	    		<input disabled="disabled" class="form-control" type="text" value="{{$estado->name}}">
	        	    	</td>
	        	    </tr>
	        	    <tr>
	        	    	<th>Ubicación</th>
	        	    	<td>
	        	    		<input disabled="disabled" class="form-control" type="text" value="{{$ubicacion->location_code}}">
	        	    	</td>
	        	    </tr>
	        	    <tr>
	        	    	<th>Año</th>
	        	    	<td>
	        	    		<input type="number" disabled="disabled" name="year" value="{{date_format($carro->year,"Y")}}" class="form-control">
	        	    	</td>
	        	    </tr>
	        	  </tbody>
	        	</table>
	        </div>
	    </div>
	</div>
	<div class="col-lg-6 col-md-6" >
		<img src="{{asset('img/carros/'.$carro->image)}}" width="100%">
	</div>
</div>
@endsection

@section('js')

@endsection


