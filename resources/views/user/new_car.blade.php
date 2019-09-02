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
	        	<form class="well form-horizontal" method="post" enctype="multipart/form-data" action="{{route('car store')}}">
					@csrf
	        	    <tr>
	        	    	<th>Marca</th>
	        	    	<td>
	        	    		<select name="marca" id="marca"  class="form-control @error('marca') is-invalid @enderror">
								<option selected=""> Seleccione la marca</option>
								@foreach($marcas as $marca)
								<option value="{{$marca->id}}" {{old('marca') == $marca->id ? 'selected' : ''}}>{{$marca->name}}</option>
								@endforeach
							</select>
							@error('marca')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('marca') }}</strong>
                                </span>
                            @enderror
						</td>
	        	    </tr>
	        	    <tr>
	        	    	<th>Modelo</th>
	        	    	<td>
	        	    		<select name="modelo" id="modelo"  class="form-control @error('modelo') is-invalid @enderror">
								<option selected=""> Seleccione el modelo</option>
								@foreach($modelos as $modelo)
								<option value="{{$modelo->id}}" {{old('modelo') == $modelo->id ? 'selected' : ''}}>{{$modelo->name}}</option>
								@endforeach
							</select>
							@error('modelo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('modelo') }}</strong>
                                </span>
                            @enderror
						</td>
	        	    </tr>
	        	    <tr>
	        	    	<th>Chasis</th>
	        	    	<td>
	        	    		<input name="chasis" id="chasis" class="form-control @error('chasis') is-invalid @enderror"  placeholder="Chasis..."  type="text" value="{{ old('chasis') }}">
	        	    		@error('chasis')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('chasis') }}</strong>
                                </span>
                            @enderror
	        	    	</td>
	        	    </tr>
	        	    <tr>
	        	    	<th>Placa</th>
	        	    	<td>
	        	    		<input name="placa" id="placa" class="form-control @error('placa') is-invalid @enderror"  placeholder="Placa..."  type="text" value="{{ old('placa') }}">
	        	    		@error('placa')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('placa') }}</strong>
                                </span>
                            @enderror
	        	    	</td>
	        	    </tr>
	        	    <tr>
	        	    	<th>Tipo</th>
	        	    	<td>
	        	    		<select name="tipo" id="tipo"  class="form-control @error('tipo') is-invalid @enderror">
								<option selected=""> Seleccione el tipo</option>
								@foreach($tipos as $tipo)
								<option value="{{$tipo->id}}" {{old('tipo') == $tipo->id ? 'selected' : ''}}>{{$tipo->name}}</option>
								@endforeach
							</select>
							@error('tipo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('tipo') }}</strong>
                                </span>
                            @enderror
	        	    	</td>
	        	    </tr>
	        	    <tr>
	        	    	<th>Estado</th>
	        	    	<td>
	        	    		<select name="estado" id="estado" class="form-control @error('estado') is-invalid @enderror">
								<option selected=""> Seleccione el estado</option>
								@foreach($estados as $estado)
								<option value="{{$estado->id}}" {{old('estado') == $estado->id ? 'selected' : ''}}>{{$estado->name}}</option>
								@endforeach
							</select>
							@error('estado')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('estado') }}</strong>
                                </span>
                            @enderror
	        	    	</td>
	        	    </tr>
	        	    <tr>
	        	    	<th>Ubicación</th>
	        	    	<td>
	        	    		<select name="ubicacion" id="ubicacion"  class="form-control @error('ubicacion') is-invalid @enderror">
								<option selected=""> Seleccione la ubicacion</option>
								@foreach($ubicaciones as $ubicacion)
								<option value="{{$ubicacion->id}}" {{old('ubicacion') == $ubicacion->id ? 'selected' : ''}}>{{$ubicacion->location_code}}</option>
								@endforeach
							</select>
							@error('ubicacion')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('ubicacion') }}</strong>
                                </span>
                            @enderror
	        	    	</td>
	        	    </tr>
	        	    <tr>
	        	    	<th>Año</th>
	        	    	<td>
	        	    		<input type="number" min="1900" max="2020" name="year" value="{{old('year')}}" class="form-control @error('year') is-invalid @enderror">
							@error('year')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('year') }}</strong>
                                </span>
                            @enderror
	        	    	</td>
	        	    </tr>
	        	    <tr>
	        	    	<th>Subir foto</th>
	        	    	<td>
	        	    		<input name="imagen" class="form-control @error('imagen') is-invalid @enderror"  type="file" value="{{ old('imagen') }}">
	        	    		@error('imagen')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('imagen') }}</strong>
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


