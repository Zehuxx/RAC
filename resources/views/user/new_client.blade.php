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
	        	    		<input type="text" name="name" id="name" value="" class="form-control">
                            @if($errors->has('name'))
                            <div class="alert alert-danger">
                                <span>*{{ $errors->first('name') }}</span>
                            </div>
            			    @endif
                        </td>
	        	    </tr>
								<tr>
	        	    	<th>Apellidos</th>
	        	    	<td>
                            <input type="text" name="last_name" id="last_name" value="" class="form-control">
                            @if($errors->has('last_name'))
                            <div class="alert alert-danger">
                                <span>*{{ $errors->first('last_name') }}</span>
                            </div>
            			    @endif
	        	    	</td>
	        	    </tr>
								<tr>
	        	    	<th>Tarjeta de identidad</th>
	        	    	<td>
                            <input type="text" name="identification_card" id="identification_card" value="" class="form-control">
                            @if($errors->has('identification_card'))
                            <div class="alert alert-danger">
                                <span>*{{ $errors->first('identification_card') }}</span>
                            </div>
            			    @endif
	        	    	</td>
	        	    </tr>
								<tr>
	        	    	<th>Telefono</th>
	        	    	<td>
                            <input type="tel" name="phone" id="phone" value="" class="form-control">
                            @if($errors->has('phone'))
                            <div class="alert alert-danger">
                                <span>*{{ $errors->first('phone') }}</span>
                            </div>
            			    @endif
	        	    	</td>
	        	    </tr>
	        	    <tr>
	        	    	<th>Direccion</th>
	        	    	<td>
                            <textarea class="form-control" name="home_address" id="home_address" placeholder="Direccion..." aria-label="With textarea"></textarea>
                            @if($errors->has('home_address'))
                            <div class="alert alert-danger">
                                <span>*{{ $errors->first('home_address') }}</span>
                            </div>
            			    @endif
	        	    	</td>
	        	    </tr>

                    <tr>
	        	    	<th>Sexo</th>
	        	    	<td>
	        	    		<select name="gender" id="gender"  class="form-control">
								<option selected=""> Sexo...</option>
								<option value="F">Femenino</option>
								<option value="M">Masculino</option>
                            </select>
                            @if($errors->has('gender'))
                            <div class="alert alert-danger">
                                <span>*{{ $errors->first('gender') }}</span>
                            </div>
            			    @endif
						</td>
	        	    </tr>
                    <tr>
	        	    	<th>Fecha nacimiento</th>
	        	    	<td>
                            <input type="date" name="birth_date" id="birth_date" value="" class="form-control">
                            @if($errors->has('birth_date'))
                            <div class="alert alert-danger">
                                <span>*{{ $errors->first('birth_date') }}</span>
                            </div>
            			    @endif
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


