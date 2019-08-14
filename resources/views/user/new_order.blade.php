@extends('layouts.user')

@section('route')
    <li class="breadcrumb-item">User</li>
    <li class="breadcrumb-item"><!--<a href="{{route('user home')}}"></a>-->Home</li>
    <li class="breadcrumb-item active">
        <a href="#">Nueva orden</a>
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
	        	<i class="fa fa-plus-circle"></i> Nueva orden
	        </div>
	        <div class="card-body">
	        	<table class="table  table-striped table-hover">
	        	  <tbody>
	        	<form class="well form-horizontal" method="post" action="#">
					@csrf
	        	    <tr>
	        	    	<th>Tipo orden</th>
	        	    	<td>
	        	    		<select name="tipo" id="tipo"  class="form-control">
								<option selected=""> Seleccione el tipo</option>
								<option value="1">LUJO</option>
							</select>
						</td>
	        	    </tr>
	        	    <tr>
	        	    	<th>Cliente</th>
	        	    	<td>
	        	    		<select name="cliente" id="cliente"  class="form-control">
								<option selected=""> Seleccione el tipo</option>
								<option value="1">LUJO</option>
							</select>
						</td>
	        	    </tr>
	        	    <tr>
	        	    	<th>Fecha reingreso</th>
	        	    	<td>
	        	    		<input type="date" name="fecha" id="fecha" value="" class="form-control">
	        	    	</td>
	        	    </tr>
	        	    <tr>
	        	    	<th>Descripción</th>
	        	    	<td>
	        	    		<textarea class="form-control" name="descripcion" id="descripcion" placeholder="Descripcion..." aria-label="With textarea"></textarea>
	        	    	</td>
	        	    </tr>
	        	  </tbody>
	        	</table>
					<button class='btn  btn-success' id="guardar" type='submit' style='border-radius: 0px;'>Guardar</button>
					<button class='btn btn-primary' id="cliente" type='button' style='border-radius: 0px;float: right;'> Agregar cliente</button>
			    	
				</form> 
	        </div>
	    </div>
	</div>
</div>
@endsection

@section('js')
@endsection


