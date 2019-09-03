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
<div class="col-md-6">
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
                        <input class="form-control" id="nombre" type="text" name="nombre" placeholder="Nombre">
                        <span class="help-block">Su nombre</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="apellido">Apellido</label>
                    <div class="col-md-9">
                        <input class="form-control" id="apellido" type="text" name="apellido" placeholder="Apellido">
                        <span class="help-block">Porfavor introduzca su apellido</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="identidad">Identidad</label>
                    <div class="col-md-9">
                        <input class="form-control" id="identidad" type="text" name="identidad" placeholder="NNNN-NNNN-NNNNN">
                        <span class="help-block">Identidad</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="telefono">Teléfono</label>
                    <div class="col-md-9">
                        <input class="form-control" id="telefono" type="text" name="telefono" placeholder="NNNN-NNNN">
                        <span class="help-block">Teléfono</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="direccion">Dirección</label>
                    <div class="col-md-9">
                        <input class="form-control" id="direccion" type="text" name="direccion" placeholder="Eje. Col...">
                        <span class="help-block">Dirección</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="sexo">Sexo</label>
                    <div class="col-md-9">
                        <select class="form-control" id="sexo" name="sexo">
                            <option value="0">Seleccionar...</option>
                            <option value="1">M</option>
                            <option value="2">F</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="fecha-nacimiento">Fecha de nacimiento</label>
                    <div class="col-md-9">
                        <input class="form-control" id="fecha-nacimiento" type="date" name="fecha-nacimiento" placeholder="date">
                        <span class="help-block">Please enter a valid date</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="rol">Rol</label>
                    <div class="col-md-9">
                        <select class="form-control" id="rol" name="rol">
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
                        <input class="form-control" id="salario" type="text" name="salario" placeholder="NNNN-NNNN-NNNNN">
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
                                    <input class="form-control" id="comision" type="text" name="comision" placeholder="NNNN-NNNN-NNNNN">
                                    <span class="help-block">Comision</span>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label" for="meta">Meta</label>
                                <div class="col-md-9">
                                    <input class="form-control" id="meta" type="text" name="meta" placeholder="NNNN-NNNN-NNNNN">
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
                        <input class="form-control" id="Email" type="email" name="Email" placeholder="ejemplo@email.com">
                        <span class="help-block">Correo electronico</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="password">Password</label>
                    <div class="col-md-9">
                        <input class="form-control" id="password" type="password" name="password" placeholder="Password">
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
