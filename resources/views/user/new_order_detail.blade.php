@extends('layouts.user')

@section('route')
    <li class="breadcrumb-item">User</li>
    <li class="breadcrumb-item"><!--<a href="{{route('user home')}}"></a>-->Home</li>
    <li class="breadcrumb-item">Orden</li>
    <li class="breadcrumb-item active">
        <a href="#">Nueva detalle</a>
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
	        	<i class="fa fa-plus-circle"></i> Nuevo detalle
	        </div>
	        <div class="card-body">

	        	<table class="table  table-striped table-hover">
	        		@error('id')
                       	<span class="invalid-feedback" style="display: table-cell;" role="alert">
                       	    <strong>{{ $errors->first('id') }}</strong>
                       	</span>
                    @enderror
	        	  <tbody>
	        	<form class="well form-horizontal" method="post" action="{{route('detail store',['id_orden','id_carro'])}}">
					@csrf
	        	    <tr>
	        	    	<th>Tipo orden</th>
	        	    	<td>
	        	    		<select name="tipomovimiento" id="tipomovimiento"  class="form-control @error('tipoorden') is-invalid @enderror">
								<option selected=""> Seleccione el tipo de movimiento</option>
								@foreach($tiposmovimientos as $tiposmovimiento)
									<option value="{{$tiposmovimiento->id}}" {{old('tipomovimiento') == $tiposmovimiento->id ? 'selected' : ''}}>{{$tiposmovimiento->name}}</option>
								@endforeach
							</select>
							@error('tipomovimiento')
                        	    <span class="invalid-feedback" role="alert">
                        	        <strong>{{ $errors->first('tipomovimiento') }}</strong>
                        	    </span>
                        	@enderror
						</td>
	        	    </tr>
	        	    <tr>
	        	    	<th>Fecha Salida</th>
	        	    	<td>
	        	    		<input type="date" class="form-control @error('fechasalida') is-invalid @enderror" name="fechasalida" value="{{old("fechasalida")}}">
							@error('fechasalida')
                        	    <span class="invalid-feedback" role="alert">
                        	        <strong>{{ $errors->first('fechasalida') }}</strong>
                        	    </span>
                        	@enderror
						</td>
	        	    </tr>
	        	    <tr>
	        	    	<th>Fecha Reeingreso</th>
	        	    	<td>
	        	    		<input type="date" class="form-control @error('fechareeingreso') is-invalid @enderror" name="fechareeingreso" value="{{old("fechareeingreso")}}">
							@error('fechareeingreso')
                        	    <span class="invalid-feedback" role="alert">
                        	        <strong>{{ $errors->first('fechareeingreso') }}</strong>
                        	    </span>
                        	@enderror
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


