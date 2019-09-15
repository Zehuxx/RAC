@extends('layouts.admin')

@section('route')
    <li class="breadcrumb-item">Admin</li>
    <li class="breadcrumb-item">Modelos</li>
    <li class="breadcrumb-item active">
        <a href="#">Edit</a>
    </li>
@endsection

@section('cards')
<div class="col-md-6 mx-auto my-5">
    <div class="card">
        <div class="card-header">
            <i class="fa fa-pencil"></i>
            <strong>Editar modelo</strong>
        </div>
        <div class="card-body">
        <form class="form-horizontal" name="modelo" id="modelo" action="{{ route('admin models update', $model->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="name">Modelo</label>
                    <div class="col-md-9">
                    <input class="form-control" id="name" type="text" name="name" placeholder="Nombre" value="{{ old('name', $model->name) }}">
                        @if($errors->has('name'))
                        <div class="alert alert-danger">
                            <span>* {{ $errors->first('name') }}</span>
                        </div>
                        @endif
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer">
            <button class="btn btn-sm btn-primary" type="submit" form="modelo">
                <i class="fa fa-refresh"></i> Actualizar</button>
            <a class="btn btn-sm btn-danger" href="{{ route('admin models') }}">
                <i class="fa fa-ban"></i> Cancelar</a>
        </div>
    </div>
</div>
@endsection
