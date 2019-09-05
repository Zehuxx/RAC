@extends('layouts.admin')

@section('route')
    <li class="breadcrumb-item">Admin</li>
    <li class="breadcrumb-item active">
        <a href="#">Home</a>
    </li>
@endsection

@section('cards')
<div class="col-md-6 mx-auto my-5">
    <div class="card">
        <div class="card-header">
            <i class="fa fa-plus"></i>
            <strong>Nuevo tipo</strong>
        </div>
        <div class="card-body">
        <form class="form-horizontal" id="tipos" action="{{ route('admin types store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="name">Tipo</label>
                    <div class="col-md-9">
                        <input class="form-control" id="name" type="text" name="name" placeholder="Tipo">
                        <span class="help-block">Tipo</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="cost">Costo</label>
                    <div class="col-md-9">
                        <input class="form-control" id="cost" type="number" step=".01" name="cost" placeholder="000000.00">
                        <span class="help-block">cost0</span>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer">
            <button class="btn btn-sm btn-primary" type="submit" form="tipos">
                <i class="fa fa-dot-circle-o"></i> Guardar</button>
            <a class="btn btn-sm btn-danger" href="{{ route('admin types') }}">
                <i class="fa fa-ban"></i> Cancelar</a>
        </div>
    </div>
</div>
@endsection
