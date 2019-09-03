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
	        	<form class="well form-horizontal" method="post" action="{{route('order store')}}">
					@csrf
	        	    <tr>
	        	    	<th>Tipo orden</th>
	        	    	<td>
	        	    		<select name="tipoorden" id="tipoorden"  class="form-control @error('tipoorden') is-invalid @enderror">
								<option selected=""> Seleccione el tipo</option>
								@foreach($tiposordenes as $tiposorden)
									<option value="{{$tiposorden->id}}" {{old('tipoorden') == $tiposorden->id ? 'selected' : ''}}>{{$tiposorden->name}}</option>
								@endforeach
							</select>
							@error('tipoorden')
                        	    <span class="invalid-feedback" role="alert">
                        	        <strong>{{ $errors->first('tipoorden') }}</strong>
                        	    </span>
                        	@enderror
						</td>
	        	    </tr>
	        	    <tr>
	        	    	<th>Cliente</th>
	        	    	<td>
	        	    		<select name="cliente" id="cliente"  class="form-control @error('cliente') is-invalid @enderror">
								<option selected=""> Seleccione el cliente</option>
								@foreach($clientes as $cliente)
									<option value="{{$cliente->id}}" {{old('cliente') == $cliente->id ? 'selected' : ''}}>{{$cliente->person->name.' '.$cliente->person->last_name.'  '.$cliente->person->identification_card}}</option>
								@endforeach
							</select>
							@error('cliente')
                        	    <span class="invalid-feedback" role="alert">
                        	        <strong>{{ $errors->first('cliente') }}</strong>
                        	    </span>
                        	@enderror
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


