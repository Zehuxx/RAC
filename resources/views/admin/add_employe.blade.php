@extends('layouts.admin')

@section('route')
    <li class="breadcrumb-item">Admin</li>
    <li class="breadcrumb-item active">
        <a href="#">Home</a>
    </li>
@endsection

@section('cards')
<form action="/empleados/Crear" method="POST">
    @csrf
<div class="col-md-6 mx-auto">
    <div class="card">
        <div class="card-header">
            <i class="fa fa-plus"></i>
            <strong>Nuevo empleado</strong>
        </div>
        <div class="card-body">
            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">

                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="nombre">Nombre</label>
                    <div class="col-md-9">
                    <input class="form-control" id="nombre" type="text" name="nombre" value="{{ old('nombre') }}" placeholder="{{$holders['name']}}" required>
                    @if($errors->has('nombre'))
                    <div class="alert alert-danger">
                        <span>*{{ $errors->first('nombre') }}</span>
                    </div>
                    @endif    
                    <span class="help-block">Su nombre</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="apellido">Apellido</label>
                    <div class="col-md-9">
                    <input class="form-control" id="apellido" type="text" name="apellido" value="{{ old('apellido') }}" placeholder="{{$holders['last']}}" required>
                    @if($errors->has('apellido'))
                    <div class="alert alert-danger">
                        <span>*{{ $errors->first('apellido') }}</span>
                    </div>
                    @endif    
                    <span class="help-block">Porfavor introduzca su apellido</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="identidad">Identidad</label>
                    <div class="col-md-9">
                    <input class="form-control" id="identidad" type="text" name="identidad" value="{{ old('identidad') }}" placeholder="{{$holders['id']}}" required>
                    @if($errors->has('identidad'))
                    <div class="alert alert-danger">
                        <span>*{{ $errors->first('identidad') }}</span>
                    </div>
                    @endif    
                    <span class="help-block">Identidad</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="telefono">Teléfono</label>
                    <div class="col-md-9">
                        <input class="form-control" id="telefono" type="text" name="telefono" value="{{ old('telefono') }}" placeholder="{{$holders['tel']}}" required>
                        @if($errors->has('telefono'))
                        <div class="alert alert-danger">
                            <span>*{{ $errors->first('telefono') }}</span>
                        </div>
                        @endif
                        <span class="help-block">Teléfono</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="direccion">Dirección</label>
                    <div class="col-md-9">
                        <input class="form-control" id="direccion" type="text" name="direccion" value="{{ old('direccion') }}" placeholder="{{$holders['addr']}}" required>
                        <span class="help-block">Dirección</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="sexo">Sexo</label>
                    <div class="col-md-9">
                        <select class="form-control" id="sexo" name="sexo" value="{{ old('sexo') }}">
                            <option value="0">Seleccionar...</option>
                            <option value="1">M</option>
                            <option value="2">F</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="fecha-nacimiento">Fecha de nacimiento</label>
                    <div class="col-md-9">
                        <input class="form-control" id="fecha-nacimiento" type="date" name="fecha-nacimiento" value="{{ old('fecha-nacimiento') }}" placeholder="{{$holders['birthdate']}}" required>
                        <span class="help-block">Please enter a valid date</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="rol">Rol</label>
                    <div class="col-md-9">
                        <select class="form-control" id="rol" name="rol" value="{{ old('rol') }}">
                            <option value="0">Seleccionar...</option>
                            <option value="1">Asistente</option>
                            <option value="2">User</option>
                            <option value="3">Admin</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="salario">Salario</label>
                    <div class="col-md-9">
                        <input class="form-control" id="salario" type="text" name="salario" value="{{ old('salario') }}" placeholder="{{$holders['salary']}}" required>
                        <span class="help-block">Salario</span>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="container">
                        <p>Datos vendedor (Solo para empleados vendedores)</p>
                        <button type="button" class="btn btn-primary" data-toggle="collapse" data-target="#demo">Datos vendedor</button>
                        <br>
                        <div id="demo" class="collapse">

                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="comision">Comision</label>
                                <div class="col-md-9">
                                    <input class="form-control" id="comision" type="text" name="comision" value="{{ old('comision') }}" placeholder="{{$holders['commission']}}">
                                    <span class="help-block">Comision</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="meta">Meta</label>
                                <div class="col-md-9">
                                    <input class="form-control" id="meta" type="text" name="meta" value="{{ old('meta') }}" placeholder="{{$holders['goal']}}">
                                    <span class="help-block">Meta</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="Email">Email</label>
                    <div class="col-md-9">
                        <input class="form-control" id="Email" type="email" name="Email" value="{{ old('Email') }}" placeholder="{{$holders['email']}}" required>
                        <span class="help-block">Correo electronico</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="password">Password</label>
                    <div class="col-md-9">
                        <input class="form-control" id="password" type="password" name="password" placeholder="" required>
                        <span class="help-block">Please enter a complex password</span>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer">
            <button class="btn btn-sm btn-primary" type="submit">
                <i class="fa fa-dot-circle-o"></i> Submit</button>
            <button class="btn btn-sm btn-danger" type="reset">
                <i class="fa fa-ban"></i> Reset</button>
        </div>
    </div>
</div>
</form>
@endsection
