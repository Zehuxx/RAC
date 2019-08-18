@extends('layouts.user')

@section('route')
    <li class="breadcrumb-item">User</li>
    <li class="breadcrumb-item"><!--<a href="{{route('user home')}}"></a>-->Home</li>
    <li class="breadcrumb-item active">
        <a href="#">Nuevo cliente</a>
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
	        	<i class="fa fa-plus-circle"></i> Nuevo cliente
	        </div>
	        <div class="card-body">
	        	<table class="table  table-striped table-hover">
	        	  <tbody>
	        	<form class="well form-horizontal" method="post" action="#">
					@csrf 
	        	    <tr>
	        	    	<th>Nombres</th>
	        	    	<td>
	        	    		<input type="text" name="fecha" id="fecha" value="" class="form-control">
	        	    	</td>
	        	    </tr>
								<tr>
	        	    	<th>Apellidos</th>
	        	    	<td>
	        	    		<input type="text" name="fecha" id="fecha" value="" class="form-control">
	        	    	</td>
	        	    </tr>
								<tr>
	        	    	<th>Tarjeta de identidad</th>
	        	    	<td>
	        	    		<input type="text" name="fecha" id="fecha" value="" class="form-control">
	        	    	</td>
	        	    </tr>
								<tr>
	        	    	<th>Telefono</th>
	        	    	<td>
	        	    		<input type="tel" name="fecha" id="fecha" value="" class="form-control">
	        	    	</td>
	        	    </tr>
	        	    <tr>
	        	    	<th>Direccion</th>
	        	    	<td>
	        	    		<textarea class="form-control" name="descripcion" id="descripcion" placeholder="Descripcion..." aria-label="With textarea"></textarea>
	        	    	</td>
	        	    </tr>
								<tr>
	        	    	<th>Empresa</th>
	        	    	<td>
	        	    		<select name="cliente" id="cliente"  class="form-control">
								<option selected=""> Seleccione el tipo</option>
								<option value="1">LUJO</option>
							</select>
						</td>
	        	    </tr>
								<tr>
	        	    	<th>Sexo</th>
	        	    	<td>
	        	    		<select name="cliente" id="cliente"  class="form-control">
								<option selected=""> Seleccione el tipo</option>
								<option value="1">Femenino</option>
								<option value="2">Masculino</option>
							</select>
						</td>
	        	    </tr>
								<tr>
	        	    	<th>Fecha nacimiento</th>
	        	    	<td>
	        	    		<input type="date" name="fecha" id="fecha" value="" class="form-control">
	        	    	</td>
	        	    </tr>
	        	  </tbody>
	        	</table>
					<button class='btn  btn-success' id="guardar" type='submit' style='border-radius: 0px;'>Cerrar</button>
					<button class='btn btn-primary' id="cliente" type='button' style='border-radius: 0px;float: right;'> Agregar cliente</button>
			    	
				</form> 
	        </div>
	    </div>
	</div>
</div>
@endsection

@section('js')
@endsection


