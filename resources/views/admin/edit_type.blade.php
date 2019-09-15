@extends('layouts.admin')

@section('route')
    <li class="breadcrumb-item">Admin</li>
    <li class="breadcrumb-item">Tipos</li>
    <li class="breadcrumb-item active">
        <a href="#">Edit</a>
    </li>
@endsection

@section('cards')
<div class="col-md-6 mx-auto my-5">
    <div class="card">
        <div class="card-header">
            <i class="fa fa-pencil"></i>
            <strong>Editar tipo</strong>
        </div>
        <div class="card-body">
        <form class="form-horizontal" id="tipos" action="{{ route('admin types update', $carType->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="name">Tipo</label>
                    <div class="col-md-9">
                        <input class="form-control" id="name" type="text" name="name" placeholder="Tipo" value="{{ old('name', $carType->name) }}">
                        @if($errors->has('name'))
                        <div class="alert alert-danger">
                            <span>* {{ $errors->first('name') }}</span>
                        </div>
                        @endif
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="cost">Costo</label>
                    <div class="col-md-9">
                        <input class="form-control" id="cost" type="number" step=".01" min="0" name="cost" placeholder="000000.00"  value="{{ old('cost', $carType->cost) }}">
                        @if($errors->has('cost'))
                        <div class="alert alert-danger">
                            <span>* {{ $errors->first('cost') }}</span>
                        </div>
                        @endif
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer">
            <button class="btn btn-sm btn-primary" type="submit" form="tipos">
                <i class="fa fa-refresh"></i> Actualizar</button>
            <a class="btn btn-sm btn-danger" href="{{ route('admin types') }}">
                <i class="fa fa-ban"></i> Cancelar</a>
        </div>
    </div>
</div>
@endsection
