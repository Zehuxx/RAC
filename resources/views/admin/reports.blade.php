@extends('layouts.admin')

@section('route')
    <li class="breadcrumb-item">Admin</li>
    <li class="breadcrumb-item active">
        <a href="#">Reportes</a>
    </li>
@endsection

@section('cards')
<div class="card">
    <div class="card-header">
        <i class=" icon-magnifier"></i> Filtrar
    </div>
    <div class="card-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12"> 
                <form role="form" id="reporte" name="reporte" action="{{route('admin reports generate')}}" method="POST"> 
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="fechainicial" class="col-sm-4 col-form-label">Reporte</label>
                            <div class="col-sm-10">
                                <select class=" form-control @error('slc-reporte') is-invalid @enderror" name="slc-reporte" id="slc-reporte">
                                    <option value="0">--Seleccione tipo de reporte--</option>
                                    <option value="1" {{("1"===old('slc-reporte')) ? 'selected':''}}>Empleados</option>
                                    <option value="2" {{("2"===old('slc-reporte')) ? 'selected':''}}>Carros</option>
                                </select>
                                @error('slc-reporte')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('slc-reporte') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                          <label for="slc-grafica" class="col-sm-4 col-form-label">Gráfica</label>
                            <div class="col-sm-10">
                                <select class=" form-control @error('slc-grafica') is-invalid @enderror" name="slc-grafica" id="slc-grafica">
                                    <option value="0">--Seleccione tipo de grafica--</option>
                                    <option value="1" {{("1"===old('slc-grafica')) ? 'selected':''}}>Barras</option>
                                    <option value="2" {{("2"===old('slc-grafica')) ? 'selected':''}}>Lineas</option>
                                    <option value="3" {{("3"===old('slc-grafica')) ? 'selected':''}}>Pastel</option>
                                </select>
                                @error('slc-grafica')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('slc-grafica') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6" >
                            <label for="fechainicial" class="col-sm-4 col-form-label" style="padding-top: 0px">Fecha inicial</label>
                            <div class="col-sm-10">
                                <input class="form-control @error('fechainicial') is-invalid @enderror" id="fechainicial" type="date" name="fechainicial" value="{{ old('fechainicial') }}">
                                @error('fechainicial')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fechainicial') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        {{--}}<div class="form-group col-md-6">
                            <label for="fechafinal" class="col-sm-4 col-form-label">Fecha Final</label>
                            <div class="col-sm-10">
                                <input class="form-control @error('fechafinal') is-invalid @enderror" id="fechafinal" type="date" name="fechafinal" value="{{ old('fechafinal') }}">
                                @error('fechafinal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('fechafinal') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>{{--}}
                        <fieldset class="form-group col-md-6">
                            <div class="row">
                                <label class="col-form-label col-sm-2 pt-0" style="padding-left: 30px;padding-right: 0px">Filtro</label>
                                <div class="col-sm-10">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="tiempo"  value="1" checked>
                                        <label class="form-check-label" for="gridRadios1">Anual</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="tiempo"  value="2">
                                        <label class="form-check-label" for="gridRadios2">Mensual</label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <div class="form-group col-md-6" id="item" style="display: none;">
                            <label for="name" id="name-fil" class="col-sm-4 col-form-label" style="padding-top: 0px" ></label>
                            <div class="col-sm-10">
                                <input class="form-control @error('text-fil') is-invalid @enderror" id="text-fil" type="text" placeholder="opcional" name="text-fil" value="{{ old('text-fil') }}" >
                                @error('text-fil')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('text-fil') }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                
                        <div class="form-group col-md-6">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary" form="reporte">Filtrar</button>
                            </div>
                        </div>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>

@if($errors->has('NR') || $grafica!=null)
<div class="card">
    @if($grafica!=null)
    <div class="card-header">
        <div class="col input-group">
            <form action="{{route('admin pdf')}}" method="POST" target="_blank">
                @csrf
                <input type="hidden" value="{{$info}}" name="info">
                <input type="hidden" value="{{$repor_id}}" name="repor_id">
                <input type="hidden" name="img_repor" id="img_repor">
                
                <button type="submit" class="btn btn-pdf" style="background-color: transparent;"></button>
            </form>
        </div>
    </div>
    @endif
    <div class="card-body">
      <div class="container-fluid">
        <div class="row">
            @error('NR')
                <h5>{{ $errors->first('NR') }}</h5>
            @enderror
            @if($grafica!=null)
                <div class="col-md-12">
                    {!!$grafica->container()!!}
                </div>
            @endif
            
        </div>
          
      </div>

    </div>
  </div>
@endif
@endsection

@section('js')
<script type="text/javascript">
    $("#slc-reporte").on('change',function(){
        var option=Number($(this).val());
        if (option===1 || option===2) {
            if (option===1) {
                $("#name-fil").text('N. Identidad');
            }else{
                 $("#name-fil").text('N. Placa');
            }
             
            $("#item").css('display','block');
        }else{
            $("#item").css('display','none');
        }
        
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
@if($grafica!=null)
<script type="text/javascript">
        // draw background
        var backgroundColor = 'white';
        Chart.plugins.register({
            beforeDraw: function(c) {
                var ctx = c.chart.ctx;
                ctx.fillStyle = backgroundColor;
                ctx.fillRect(0, 0, c.chart.width, c.chart.height);
            }
        });
</script>
   {!! $grafica->script() !!}
    <script type="text/javascript">

        
        var dataset='<?php echo json_encode($grafica->datasets);?>';
        var labels='<?php echo json_encode($grafica->labels);?>';
        var options='<?php echo json_encode($grafica->options);?>';
        labels=JSON.parse(labels);
        options=JSON.parse(options);
        dataset=JSON.parse(dataset)[0];
        var opt=dataset.options;

        function done(){
          var url=document.getElementById('{{$grafica->id}}').toDataURL("image/jpg");
          $('#img_repor').val(url);
        }
        var ctx = new Chart(document.getElementById('{{$grafica->id}}').getContext("2d"),{
                                                     data: {
                                                        labels: labels,
                                                        datasets: [{"borderWidth":opt.borderWidth,"backgroundColor":opt.backgroundColor,"data":dataset.values,"label":dataset.name,"type":dataset.type,}]
                                                    },
                                                      type:dataset.type,
                                                      options:{"maintainAspectRatio":options.maintainAspectRatio,"scales":options.scales,bezierCurve : false,
                                                          animation: {
                                                            onComplete: done
                                                          }
                                                           }
                                                    });

        
    </script>
@endif

@endsection