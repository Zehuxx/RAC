@extends('layouts.admin')

@section('route')
    <li class="breadcrumb-item">Admin</li>
    <li class="breadcrumb-item">Tipos</li>
    <li class="breadcrumb-item active">
        <a href="#">Add</a>
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
                        <input class="form-control" id="name" type="text" value="{{ old('name') }}" name="name" placeholder="Tipo">
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
                        <input class="form-control" min="0" id="cost" type="number" {{ old('cost') }} step=".01" name="cost" placeholder="000000.00">
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
                <i class="fa fa-save"></i> Guardar</button>
            <a class="btn btn-sm btn-danger" href="{{ route('admin types') }}">
                <i class="fa fa-ban"></i> Cancelar</a>
        </div>
    </div>
</div>
@endsection
