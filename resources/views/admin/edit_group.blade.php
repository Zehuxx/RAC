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
        <form class="form-horizontal" name="modelo" id="modelo" action="{{ route('admin groups update', $group->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put') 
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="name">Nombre</label>
                    <div class="col-md-9">
                        <input class="form-control @error('name') is-invalid @enderror" id="name" type="text" name="name" value="{{ old('name', $group->name) }}" placeholder="Nombre">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="car_type">Tipo auto</label>
                    <div class="col-md-9">
                        <select class="form-control @error('car_type') is-invalid @enderror" name="car_type" id="car_type" value="{{old('car_Type', $group->car_type_id)}}">
                            <option value="">-- Seleccione el tipo de carro --</option>
                            @foreach ($carTypes as $carType)
                                <option {{ ($group->car_type_id == $carType->id) ? 'selected' : '' }} value="{{ $carType->id }}"> {{ $carType->name }} </option>
                            @endforeach
                        </select>
                        @error('car_type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('car_type') }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="comission">Comisión</label>
                    <div class="col-md-9">
                        <input class="form-control @error('comission') is-invalid @enderror" id="comission" type="text" name="comission" value="{{ old('comission', $group->commission) }}" placeholder="Commisió">
                        @error('comission')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('comission') }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="goal">Meta</label>
                    <div class="col-md-9">
                        <input class="form-control @error('goal') is-invalid @enderror" id="goal" type="number" name="goal" value="{{ old('goal', $group->sale_goal) }}" placeholder="Meta">
                        @error('goal')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('goal') }}</strong>
                            </span>
                        @enderror
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
