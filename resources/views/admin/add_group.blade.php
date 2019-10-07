@extends('layouts.admin')

@section('route')
    <li class="breadcrumb-item">Admin</li>
    <li class="breadcrumb-item">Group</li>
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
        <form class="form-horizontal" name="modelo" id="modelo" action="{{ route('admin groups store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="name">Nombre</label>
                    <div class="col-md-9">
                        <input class="form-control" id="name" type="text" name="name" value="{{ old('name') }}" placeholder="Nombre">
                        {{-- @if($errors->has('name'))
                        <div class="alert alert-danger">
                            <span>* {{ $errors->first('name') }}</span>
                        </div>
                        @endif --}}
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="car_type">Tipo auto</label>
                    <div class="col-md-9">
                        <select class="form-control" name="car_type" id="car_type" value="">
                            @foreach ($carTypes as $carType)
                                <option value="{{ $carType->id }}"> {{ $carType->name }} </option>
                            @endforeach
                        </select>
                        {{-- @if($errors->has('name'))
                        <div class="alert alert-danger">
                            <span>* {{ $errors->first('name') }}</span>
                        </div>
                        @endif --}}
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="comission">Comisión</label>
                    <div class="col-md-9">
                        <input class="form-control" id="comission" type="number" name="comission" value="{{ old('comission') }}" placeholder="Commisió">
                        {{-- @if($errors->has('name'))
                        <div class="alert alert-danger">
                            <span>* {{ $errors->first('name') }}</span>
                        </div>
                        @endif --}}
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="goal">Meta</label>
                    <div class="col-md-9">
                        <input class="form-control" id="goal" type="number" name="goal" value="{{ old('goal') }}" placeholder="Meta">
                        {{-- @if($errors->has('name'))
                        <div class="alert alert-danger">
                            <span>* {{ $errors->first('name') }}</span>
                        </div>
                        @endif --}}
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer">
            <button class="btn btn-sm btn-primary" type="submit" form="modelo">
                <i class="fa fa-save"></i> Guardar</button>
            <a class="btn btn-sm btn-danger" href="{{ route('admin brands') }}">
                <i class="fa fa-ban"></i> Cancelar</a>
        </div>
    </div>
</div>
@endsection
