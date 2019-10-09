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
	        	<i class="fa fa-plus"></i> Nuevo cliente
	        </div>
	        <div class="card-body">
	        	<table class="table  table-striped table-hover">
	        	  <tbody>
                  <form class="well form-horizontal" id="cliente" name="cliente"  method="post" action="{{ route('user clients store') }}">
					@csrf
	        	    <tr>
	        	    	<th>Nombres</th>
	        	    	<td>
                        <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control">
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
                            <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}" class="form-control">
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
                            <input type="text" name="identification_card" id="identification_card" value="{{ old('identification_card') }}" class="form-control">
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
                            <input type="tel" name="phone" id="phone" value="{{ old('phone') }}" class="form-control">
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
                            <textarea class="form-control" name="home_address" id="home_address" placeholder="Direccion..." aria-label="With textarea">
                                {{ old('home_address') }}
                            </textarea>
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
	        	    		<select name="gender" id="gender"   class="form-control">
								<option selected=""> Sexo...</option>
								<option value="F" {{ old('gender') == "F" ? 'selected' : ''  }}>Femenino</option>
								<option value="M" {{ old('gender') == "M" ? 'selected' : ''  }}>Masculino</option>
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
                            <input type="date" name="birth_date" id="birth_date" value="{{ old('birth_date') }}" class="form-control">
                            @if($errors->has('birth_date'))
                            <div class="alert alert-danger">
                                <span>*{{ $errors->first('birth_date') }}</span>
                            </div>
            			    @endif
	        	    	</td>
                    </tr>
                    {{-- sección para seleccionar el tipo de cliente --}}
                    <tr>
	        	    	<th>Tipo de cliente</th>
	        	    	<td>
                            <select name="slc_cuenta" id="slc_cuenta" class="form-control @error('slc_cuenta') is-invalid @enderror">
                                <option value="">Seleccione tipo de cliente</option>
                                <option value="1" {{ old('slc_cuenta') == 1 ? 'selected' : ''  }}>Cliente Normal</option>
                                <option value="2" {{ old('slc_cuenta') == 2 ? 'selected' : ''  }}>Compañia</option>
                            </select>

                            @error('slc_cuenta')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('slc_cuenta') }}</strong>
                                </span>
                            @enderror
	        	    	</td>
	        	    </tr>


                        <tr id="company_data1" style="display: none">
                            <th>Nombre de la Compañia</th>
                            <td>
                            <input type="text" name="company_name" id="company_name" value="{{ old('company_name') }}" class="form-control">
                                @if($errors->has('company_name'))
                                <div class="alert alert-danger">
                                    <span>*{{ $errors->first('company_name') }}</span>
                                </div>
                                @endif
                            </td>
                        </tr>
                        <tr id="company_data2" style="display: none">
                            <th>RTN</th>
                            <td>
                            <input type="text" name="rtn" id="rtn" value="{{ old('rtn') }}" class="form-control">
                                @if($errors->has('rtn'))
                                <div class="alert alert-danger">
                                    <span>*{{ $errors->first('rtn') }}</span>
                                </div>
                                @endif
                            </td>
                        </tr>


	        	  </tbody>
	        	</table>
				</form>
            </div>

            <div class="card-footer">
                <button class="btn btn-sm btn-primary" type="submit" form="cliente">
                    <i class="fa fa-save"></i> Guardar</button>
                <a class="btn btn-sm btn-danger" href="{{ route('user clients') }}">
                    <i class="fa fa-ban"></i> Cancelar</a>
            </div>

	    </div>
	</div>
</div>
@endsection

@section('js')

@if(old('slc_cuenta')==2)
<script type="text/javascript">
     $("#company_data1").css("display","");
     $("#company_data2").css("display","");
</script>
@endif
<script type="text/javascript">

    $( "#slc_cuenta" ).change(function() {
        if ($(this).val()==2){
            $("#company_data1").css("display","");
            $("#company_data2").css("display","");
        }else{
            $("#company_data1").css("display","none");
            $("#company_data2").css("display","none");
        }
    });
</script>

@endsection


