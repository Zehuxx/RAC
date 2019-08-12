@extends('layouts.user')

@section('route')
    <li class="breadcrumb-item">User</li>
    <li class="breadcrumb-item"><!--<a href="{{route('user home')}}"></a>-->Home</li>
    <li class="breadcrumb-item active">
        <a href="#">Detalles</a>
    </li>

@endsection


@section('cards')
<div class="row">
	<div class="col-lg-6 col-md-6">
	    <div class="card">
	    	<div class="card-header">
	        	<i class="fa fa-info-circle"></i> Detalles</div>
	        <div class="card-body">
	        	<table class="table  table-striped table-hover">
	        	  <tbody>
	        	    <tr>
	        	    	<th>Marca</th>
	        	    	<td>TOYOTA</td>
	        	    </tr>
	        	    <tr>
	        	    	<th>Modelo</th>
	        	    	<TD>COROLLA</TD>
	        	    </tr>
	        	    <tr>
	        	    	<th>Chasis</th>
	        	    	<td>KKSD8832</td>
	        	    </tr>
	        	    <tr>
	        	    	<th>Placa</th>
	        	    	<td>KKSA8S3</td>
	        	    </tr>
	        	    <tr>
	        	    	<th>Tipo</th>
	        	    	<td>LUJO</td>
	        	    </tr>
	        	    <tr>
	        	    	<th>Estado</th>
	        	    	<td>DISPONIBLE</td>
	        	    </tr>
	        	    <tr>
	        	    	<th>Ubicación</th>
	        	    	<td>L34</td>
	        	    </tr>
	        	  </tbody>
	        	</table>
	        </div>
	    </div>
	</div>
	<div class="col-lg-6 col-md-6" >
		<img src="{{asset('img/carros/carro1.jpg')}}" width="100%">
	</div>
</div>
@endsection


