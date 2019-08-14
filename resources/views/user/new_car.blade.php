@extends('layouts.user')

@section('route')
    <li class="breadcrumb-item">User</li>
    <li class="breadcrumb-item"><!--<a href="{{route('user home')}}"></a>-->Home</li>
    <li class="breadcrumb-item active">
        <a href="#">Agregar carro</a>
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
<div class="row">
	<div style="width: 500px; margin: 0 auto;">
	    <div class="card">
	    	<div class="card-header">
	        	<i class="fa fa-car"></i> Agregar carro
	        </div>
	        <div class="card-body">
	        	<table class="table  table-striped table-hover">
	        	  <tbody>
	        	<form class="well form-horizontal" method="post" role="form" enctype="multipart/form-data" action="#">
					@csrf
	        	    <tr>
	        	    	<th>Marca</th>
	        	    	<td>
	        	    		<select name="marca" id="marca"  class="form-control">
								<option selected=""> Seleccione la marca</option>
								<option value="1">LUJO</option>
							</select>
						</td>
	        	    </tr>
	        	    <tr>
	        	    	<th>Modelo</th>
	        	    	<td>
	        	    		<select name="modelo" id="modelo"  class="form-control">
								<option selected=""> Seleccione el modelo</option>
								<option value="1">LUJO</option>
							</select>
						</td>
	        	    </tr>
	        	    <tr>
	        	    	<th>Chasis</th>
	        	    	<td>
	        	    		<input name="chasis" id="chasis" class="form-control"  placeholder="Chasis..."  type="text" >
	        	    	</td>
	        	    </tr>
	        	    <tr>
	        	    	<th>Placa</th>
	        	    	<td>
	        	    		<input name="placa" id="placa" class="form-control"  placeholder="Placa..."  type="text" >
	        	    	</td>
	        	    </tr>
	        	    <tr>
	        	    	<th>Tipo</th>
	        	    	<td>
	        	    		<select name="tipo" id="tipo"  class="form-control">
								<option selected=""> Seleccione el tipo</option>
								<option value="1">LUJO</option>
							</select>
	        	    	</td>
	        	    </tr>
	        	    <tr>
	        	    	<th>Estado</th>
	        	    	<td>
	        	    		<select name="estado" id="estado" class="form-control">
								<option selected=""> Seleccione el estado</option>
								<option value="1">LUJO</option>
							</select>
	        	    	</td>
	        	    </tr>
	        	    <tr>
	        	    	<th>Ubicación</th>
	        	    	<td>
	        	    		<select name="ubicacion" id="ubicacion"  class="form-control">
								<option selected=""> Seleccione la ubicacion</option>
								<option value="1">LS5</option>
							</select>
	        	    	</td>
	        	    </tr>
	        	    <tr>
	        	    	<th>Subir foto</th>
	        	    	<td>
	        	    		<input name="image" class="form-control"  type="file" >
	        	    	</td>
	        	    </tr>
	        	  </tbody>
	        	</table>
					<button class='btn  btn-success' id="guardar" type='submit' style='border-radius: 0px;'>Guardar</button>
			    	
				</form> 
	        </div>
	    </div>
	</div>
</div>
@endsection

@section('js')
@endsection


