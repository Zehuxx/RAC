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
	        	<form class="well form-horizontal" method="post" enctype="multipart/form-data" action="{{route('car update',$carro->id)}}">
					@method('PUT')
					@csrf
					<fieldset> 
	        	    <tr>
	        	    	<th>Marca</th>
	        	    	<td>
	        	    		<select name="marca" id="marca"  disabled="disabled" class="form-control @error('marca') is-invalid @enderror">
								<option selected=""> Seleccione la marca</option>
								@foreach($marcas as $marca)
								<option value="{{$marca->id}}" {{$carro->car_brand_id == $marca->id ? 'selected' : ''}}>{{$marca->name}}</option>
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
	        	    		<select name="modelo" id="modelo" disabled="disabled"  class="form-control @error('modelo') is-invalid @enderror">
								<option selected=""> Seleccione el modelo</option>
								@foreach($modelos as $modelo)
								<option value="{{$modelo->id}}" {{$carro->model_id == $modelo->id ? 'selected' : ''}}>{{$modelo->name}}</option>
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
	        	    		<input name="chasis" id="chasis" disabled="disabled" class="form-control @error('chasis') is-invalid @enderror"  placeholder="Chasis..."  type="text" value="{{ $carro->chassis }}">
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
	        	    		<input name="placa" id="placa" disabled="disabled" class="form-control @error('placa') is-invalid @enderror"  placeholder="Placa..."  type="text" value="{{ $carro->license_plate }}">
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
	        	    		<select name="tipo" id="tipo" disabled="disabled"  class="form-control @error('tipo') is-invalid @enderror">
								<option selected=""> Seleccione el tipo</option>
								@foreach($tipos as $tipo)
								<option value="{{$tipo->id}}" {{$carro->car_type_id == $tipo->id ? 'selected' : ''}}>{{$tipo->name}}</option>
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
	        	    	<th>Año</th>
	        	    	<td>
	        	    		<input type="number" id="year" min="1900" max="2020" disabled="disabled" name="year" value="{{date_format($carro->year,"Y")}}" class="form-control @error('year') is-invalid @enderror">
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
	        	    		<input name="imagen" id="imagen" disabled="disabled" class="form-control @error('imagen') is-invalid @enderror"  type="file" value="{{ old('imagen') }}">
	        	    		@error('imagen')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('imagen') }}</strong>
                                </span>
                            @enderror
	        	    	</td>
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
		<img src="{{asset('img/carros/'.$carro->image)}}" width="100%">
	</div>
</div>
@endsection

@section('js')
<script type="text/javascript">
	$("#editar").on("click",function(){
	$("#guardar").show();
    $("#marca").prop("disabled",false);
    $("#modelo").prop("disabled",false);
    $("#chasis").prop("disabled",false);
    $("#placa").prop("disabled",false);
    $("#tipo").prop("disabled",false);
    $("#estado").prop("disabled",false);
    $("#year").prop("disabled",false);
    $("#ubicacion").prop("disabled",false);
    $("#imagen").prop("disabled",false);
});
</script>
<!--<script src="{{asset('js/user/details.js')}}"></script>-->
@endsection


