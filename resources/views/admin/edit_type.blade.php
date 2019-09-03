@extends('layouts.admin')

@section('route')
    <li class="breadcrumb-item">Admin</li>
    <li class="breadcrumb-item">Tipos</li>
    <li class="breadcrumb-item active">
        <a href="#">Edit</a>
    </li>
@endsection

@section('cards')
<div class="col-md-6">
    <div class="card">
        <div class="card-header">
            <i class="fa fa-plus"></i>
            <strong>Editar tipo</strong>
        </div>
        <div class="card-body">
        <form class="form-horizontal" id="tipos" action="{{ route('admin types update', $carType->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="name">Tipo</label>
                    <div class="col-md-9">
                    <input class="form-control" id="name" type="text" name="name" placeholder="Tipo" value="{{$carType->name}}">
                        <span class="help-block">Tipo</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="cost">Costo</label>
                    <div class="col-md-9">
                        <input class="form-control" id="cost" type="number" step=".01" name="cost" placeholder="000000.00"  value="{{$carType->cost}}">
                        <span class="help-block">Costo</span>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer">
            <button class="btn btn-sm btn-primary" type="submit" form="tipos">
                <i class="fa fa-dot-circle-o"></i> Guardar Cambios</button>
            <a class="btn btn-sm btn-danger" href="{{ route('admin types') }}">
                <i class="fa fa-ban"></i> Cancelar</a>
        </div>
    </div>
</div>
@endsection
