@extends('layouts.admin')

@section('route')
    <li class="breadcrumb-item">Admin</li>
    <li class="breadcrumb-item">Marcas</li>
    <li class="breadcrumb-item active">
        <a href="#">Add</a>
    </li>
@endsection

@section('cards')
<div class="col-md-6 mx-auto my-5">
    <div class="card">
        <div class="card-header">
            <i class="fa fa-plus"></i>
            <strong>Nueva marca</strong>
        </div>
        <div class="card-body">
        <form class="form-horizontal" name="modelo" id="modelo" action="{{ route('admin brands store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="name">Marca</label>
                    <div class="col-md-9">
                        <input class="form-control" id="name" type="text" name="name" placeholder="Nombre">
                        <span class="help-block">Marca</span>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer">
            <button class="btn btn-sm btn-primary" type="submit" form="modelo">
                <i class="fa fa-dot-circle-o"></i> Guardar</button>
            <a class="btn btn-sm btn-danger" href="{{ route('admin brands') }}">
                <i class="fa fa-ban"></i> Cancelar</a>
        </div>
    </div>
</div>
@endsection
