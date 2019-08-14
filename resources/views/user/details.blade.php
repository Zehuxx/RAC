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
	        	<i class="fa fa-info-circle"></i> Detalles
	        </div>
	        <div class="card-body">
	        	<table class="table  table-striped table-hover">
	        	  <tbody>
	        	<form class="well form-horizontal" method="post" action="#">
					@method('PUT')
					@csrf
					<fieldset>
	        	    <tr>
	        	    	<th>Marca</th>
	        	    	<td>
	        	    		<select name="marca" id="marca" disabled="disabled" class="form-control">
								<option selected=""> Seleccione la marca</option>
								<option value="1">LUJO</option>
							</select>
						</td>
	        	    </tr>
	        	    <tr>
	        	    	<th>Modelo</th>
	        	    	<td>
	        	    		<select name="modelo" id="modelo" disabled="disabled"  class="form-control">
								<option selected=""> Seleccione el modelo</option>
								<option value="1">LUJO</option>
							</select>
	        	    	</td>
	        	    </tr>
	        	    <tr>
	        	    	<th>Chasis</th>
	        	    	<td><input name="chasis" id="chasis" class="form-control" disabled="disabled" placeholder="Chasis" value="KKSD8832" type="text" ></td>
	        	    </tr>
	        	    <tr>
	        	    	<th>Placa</th>
	        	    	<td><input name="placa" id="placa" class="form-control" disabled="disabled" placeholder="Placa" value="KKSA8S3" type="text" ></td>
	        	    </tr>
	        	    <tr>
	        	    	<th>Tipo</th>
	        	    	<td>
	        	    		<select name="tipo" id="tipo" disabled="disabled"  class="form-control">
								<option selected=""> Seleccione el tipo</option>
								<option value="1">LUJO</option>
							</select>
	        	    	</td>
	        	    </tr>
	        	    <tr>
	        	    	<th>Estado</th>
	        	    	<td>
	        	    		<select name="estado" id="estado" disabled="disabled"  class="form-control">
								<option selected=""> Seleccione el estado</option>
								<option value="1">DISPONIBLE</option>
							</select>
	        	    	</td>
	        	    </tr>
	        	    <tr>
	        	    	<th>Ubicación</th>
	        	    	<td>
	        	    		<select name="ubicacion" id="ubicacion" disabled="disabled"  class="form-control">
								<option selected=""> Seleccione la ubicacion</option>
								<option value="1">ls1</option>
							</select>
						</td>
	        	    </tr>
	        	    <tr>
	        	    	<th>Costo</th>
	        	    	<td><input name="costo" id="costo" class="form-control" disabled="disabled" placeholder="Costo" value="3423" type="text" ></td>
	        	    	<td></td>
	        	    </tr>
	        	  </tbody>
	        	</table>
				<div class='btn-group btn-group-lg' role='group' aria-label='Large button group' >
					<button class='btn btn-success' id="editar" type='button' style='border-radius: 0px'> Editar</button>
					<button class='btn  btn-info' id="guardar" type='submit' style='border-radius: 0px;display: none'>Guardar</button>
			    	
			    </div>
					</fieldset>
				</form> 
	        </div>
	    </div>
	</div>
	<div class="col-lg-6 col-md-6" >
		<img src="{{asset('img/carros/carro1.jpg')}}" width="100%">
	</div>
</div>
@endsection

@section('js')
<script src="{{asset('js/user/details.js')}}"></script>
@endsection


