@extends('layouts.admin')



@section('route')
    <li class="breadcrumb-item">Admin</li>
    <li class="breadcrumb-item active">
        <a href="#">Home</a>
    </li>
@endsection

@section('cards')
<div class="col-md-6 mx-auto">
    <div class="card">
        <div class="card-header">
            <i class="fa fa-plus"></i>
            <strong>Editar empleado</strong>
        </div>
        <div class="card-body">
            <form class="form-horizontal" action="{{route('admin employees update',$employee->id)}}" method="post">
                @method('PUT')
                @csrf
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="nombre">Nombre</label>
                    <div class="col-md-9">
                    <input class="form-control @error('nombre') is-invalid @enderror" placeholder="Nombre" id="nombre" type="text" name="nombre" value="{{ $employee->name }}" >
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
                    <input class="form-control @error('apellido') is-invalid @enderror" placeholder="Apellido" id="apellido" type="text" name="apellido" value="{{ $employee->last_name }}" >
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
                    <input class="form-control @error('identidad') is-invalid @enderror" id="identidad" type="text" name="identidad" value="{{ $employee->identification_card }}" placeholder="NNNN-NNNN-NNNNN" >
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
                        <input class="form-control @error('telefono') is-invalid @enderror" id="telefono" type="text" name="telefono" value="{{ $employee->phone }}" placeholder="NNNN-NNNN" >
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
                        <input class="form-control @error('direccion') is-invalid @enderror" id="direccion" type="text" name="direccion" value="{{ $employee->home_address }}" placeholder="ejem. col..." >
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
                        <select class="form-control @error('sexo') is-invalid @enderror" id="sexo" name="sexo" >
                            <option value="">Seleccionar sexo</option>
                            <option value="1" {{$employee->gender == 'M' ? 'selected' : ''}}>M</option>
                            <option value="2" {{$employee->gender == 'F' ? 'selected' : ''}}>F</option>
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
                        <input class="form-control @error('fechan') is-invalid @enderror" id="fechan" type="date" name="fechan" value="{{ $employee->birth_date }}" >
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
                            <option value="1" {{$employee->rol == 1 ? 'selected' : ''}}>Admin</option>
                            <option value="2" {{$employee->rol == 2 ? 'selected' : ''}}>User</option>
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
                    <input class="form-control @error('salario') is-invalid @enderror" id="salario" type="text" name="salario" value="{{ $employee->salario }}" >
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
                        <input class="form-control @error('email') is-invalid @enderror" placeholder="name@nnn.nnn" id="email" type="email" name="email" value="{{ $employee->email }}" required="">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="passworda">Contraseña antigua</label>
                    <div class="col-md-9">
                        <input class="form-control @error('passworda') is-invalid @enderror" id="password" type="password" name="passworda"  >
                        @error('passworda')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('passworda') }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="password">Contraseña nueva</label>
                    <div class="col-md-9">
                        <input class="form-control @error('password') is-invalid @enderror" id="password" type="password" name="password"  >
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @enderror
                    </div>
                    <input type="hidden" name="id" value="{{$employee->id}}">
                </div>
                <button class='btn  btn-success' id="guardar" type='submit' style='border-radius: 0px;'>Actualizar</button>
            </form>
        </div>
</div>
</div>
@endsection
