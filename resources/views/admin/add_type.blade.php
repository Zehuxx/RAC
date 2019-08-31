@extends('layouts.admin')

@section('route')
    <li class="breadcrumb-item">Admin</li>
    <li class="breadcrumb-item active">
        <a href="#">Home</a>
    </li>
@endsection

@section('cards')
<div class="col-md-6">
    <div class="card">
        <div class="card-header">
            <i class="fa fa-plus"></i>
            <strong>Nuevo tipo</strong>
        </div>
        <div class="card-body">
            <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                <div class="form-group row">
                    <label class="col-md-3 col-form-label" for="Tipo">Tipo</label>
                    <div class="col-md-9">
                        <input class="form-control" id="Tipo" type="text" name="Tipo" placeholder="Tipo">
                        <span class="help-block">Tipo</span>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-footer">
            <button class="btn btn-sm btn-primary" type="submit" form="">
                <i class="fa fa-dot-circle-o"></i> Submit</button>
            <button class="btn btn-sm btn-danger" type="reset">
                <i class="fa fa-ban"></i> Reset</button>
        </div>
    </div>
</div>
@endsection
