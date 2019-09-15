@extends('layouts.admin')

@section('route')
    <li class="breadcrumb-item">Admin</li>
    <li class="breadcrumb-item active">
        <a href="#">Home</a>
    </li>
@endsection

@section('cards')
<form class="form-horizontal" action="{{route('admin employees store')}}" method="post">    
<div class="col-md-6 mx-auto">
    <div class="card">
        <div class="card-header">
            <i class="fa fa-plus"></i>
            <strong>Nuevo empleado</strong>
        </div>
        <div class="card-body"> 
            
                @csrf
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="nombre">Nombre</label>
                    <div class="col-md-9">
                    <input class="form-control @error('nombre') is-invalid @enderror" placeholder="Nombre" id="nombre" type="text" name="nombre" value="{{ old('nombre') }}" >
                    @error('nombre')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('nombre') }}</strong>
                        </span>
                    @enderror  
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="apellido">Apellido</label>
                    <div class="col-md-9">
                    <input class="form-control @error('apellido') is-invalid @enderror" placeholder="Apellido" id="apellido" type="text" name="apellido" value="{{ old('apellido') }}" >
                    @error('apellido')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('apellido') }}</strong>
                        </span>
                    @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="identidad">Identidad</label>
                    <div class="col-md-9">
                    <input class="form-control @error('identidad') is-invalid @enderror" id="identidad" type="text" name="identidad" value="{{ old('identidad') }}" placeholder="NNNN-NNNN-NNNNN" >
                    @error('identidad')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('identidad') }}</strong>
                        </span>
                    @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="telefono">Teléfono</label>
                    <div class="col-md-9">
                        <input class="form-control @error('telefono') is-invalid @enderror" id="telefono" type="text" name="telefono" value="{{ old('telefono') }}" placeholder="NNNN-NNNN" >
                    @error('telefono')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('telefono') }}</strong>
                        </span>
                    @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="direccion">Dirección</label>
                    <div class="col-md-9">
                        <input class="form-control @error('direccion') is-invalid @enderror" id="direccion" type="text" name="direccion" value="{{ old('direccion') }}" placeholder="ejem. col..." >
                    @error('direccion')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('direccion') }}</strong>
                        </span>
                    @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="sexo">Sexo</label>
                    <div class="col-md-9">
                        <select class="form-control @error('sexo') is-invalid @enderror" id="sexo" name="sexo" value="{{ old('sexo') }}">
                            <option value="">Seleccionar sexo</option>
                            <option value="1" {{old('sexo') == 1 ? 'selected' : ''}}>M</option>
                            <option value="2" {{old('sexo') == 2 ? 'selected' : ''}}>F</option>
                        </select>
                        @error('sexo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('sexo') }}</strong>
                        </span>
                    @enderror
                    </div>
                    
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="fecha-nacimiento">Fecha de nacimiento</label>
                    <div class="col-md-9">
                        <input class="form-control @error('fechan') is-invalid @enderror" id="fechan" type="date" name="fechan" value="{{ old('fechan') }}" >
                        @error('fechan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('fechan') }}</strong>
                        </span>
                    @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="rol">Rol</label>
                    <div class="col-md-9">
                        <select class="form-control @error('rol') is-invalid @enderror" id="rol" name="rol">
                            <option value="">Seleccionar rol</option>
                            <option value="1" {{old('rol') == 1 ? 'selected' : ''}}>Admin</option>
                            <option value="2" {{old('rol') == 2 ? 'selected' : ''}}>User</option>
                        </select>
                        @error('rol')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('rol') }}</strong>
                        </span>
                    @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="salario">Salario</label>
                    <div class="col-md-9">
                    <input class="form-control @error('salario') is-invalid @enderror" id="salario" type="text" name="salario" value="{{ old('salario') }}" >
                    @error('salario')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('salario') }}</strong>
                        </span>
                    @enderror
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="Email">Correo</label>
                    <div class="col-md-9">
                        <input class="form-control @error('email') is-invalid @enderror" placeholder="name@nnn.nnn" id="email" type="email" name="email" value="{{ old('email') }}" required="">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="password">Contraseña</label>
                    <div class="col-md-9">
                        <input class="form-control @error('password') is-invalid @enderror" id="password" type="password" name="password" value="{{ old('password') }}" required="">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <button class='btn  btn-success' id="guardar" type='submit' style='border-radius: 0px;'>Guardar</button>
     </div>
</div>
</form>
@endsection
