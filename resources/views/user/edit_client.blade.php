@extends('layouts.user')

@section('route')
    <li class="breadcrumb-item">User</li>
    <li class="breadcrumb-item">Clientes</li>
    <li class="breadcrumb-item active">
        <a href="#">Add</a>
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
                  <form class="well form-horizontal" method="post" action="{{ route('user clients store') }}">
					@csrf
	        	    <tr>
	        	    	<th>Nombres</th>
	        	    	<td>
                        <input type="text" name="name" id="name" value="{{ $client->name }}" class="form-control">
	        	    	</td>
	        	    </tr>
								<tr>
	        	    	<th>Apellidos</th>
	        	    	<td>
	        	    		<input type="text" name="last_name" id="last_name" value="{{ $client->last_name }}" class="form-control">
	        	    	</td>
	        	    </tr>
								<tr>
	        	    	<th>Tarjeta de identidad</th>
	        	    	<td>
	        	    		<input type="text" name="identification_card" id="identification_card" value="{{ $client->identification_card }}" class="form-control">
	        	    	</td>
	        	    </tr>
								<tr>
	        	    	<th>Telefono</th>
	        	    	<td>
	        	    		<input type="tel" name="phone" id="phone" value="{{ $client->phone }}" class="form-control">
	        	    	</td>
	        	    </tr>
	        	    <tr>
	        	    	<th>Direccion</th>
	        	    	<td>
	        	    		<textarea class="form-control" name="home_address" id="home_address" placeholder="Direccion..." aria-label="With textarea"> {{ $client->home_address }} </textarea>
	        	    	</td>
	        	    </tr>

                    <tr>
	        	    	<th>Sexo</th>
	        	    	<td>
	        	    		<select name="gender" id="gender"  class="form-control">
                                <option {{ $client->gender == 'F' ? 'selected' : '' }} value="F">Femenino</option>
                                <option {{ $client->gender == 'M' ? 'selected' : '' }} value="M">Masculino</option>
							</select>
						</td>
	        	    </tr>
                    <tr>
	        	    	<th>Fecha nacimiento</th>
	        	    	<td>
	        	    		<input type="date" name="birth_date" id="birth_date" value="{{ \Carbon\Carbon::parse($client->birth_date)->format('Y-m-d') }}" class="form-control">
	        	    	</td>
	        	    </tr>
	        	  </tbody>
	        	</table>
                    <a class='btn  btn-success' href="{{ route('user clients') }}" style='border-radius: 0px;'>Cerrar</a>
					<button class='btn btn-primary' id="cliente" type='submit' style='border-radius: 0px;float: right;'> Agregar cliente</button>
				</form>
	        </div>
	    </div>
	</div>
</div>
@endsection

@section('js')
@endsection


