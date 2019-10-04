<head>
	<title>Reporte</title>
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
</head>
<h1 style="padding-bottom: 10px; text-align: center; font-size: 25px">
@if($repor_id==1)
Arrendamientos anual por tipo
@elseif($repor_id==2)
Arrendamientos mensual por tipo
@elseif($repor_id==3)
Arrendamientos anual por tipo
@else
Arrendamientos mensual por tipo
@endif
</h1>
<div style="padding-bottom: 20px;page-break-after: auto;">
	<table class="table table-striped" style="font-size: 12px;">
		<tr>
			<th>Año</th>
			@if($repor_id==1)
			<th>Tipo</th>
			<th>Total</th> 
			@elseif($repor_id==2)
			<th>Mes</th>
			<th>Tipo</th>
			<th>Total</th> 
			@elseif($repor_id==3)
			<th>Nombre</th>
			<th>Tipo</th>
			<th>Total</th> 
			@else
			<th>Mes</th>
			<th>Nombre</th>
			<th>Tipo</th>
			<th>Total</th> 
			@endif
			
		</tr>
			@foreach($info as $item)
			<tr>
				<td>{{$item->year}}</td>
				@if($repor_id==1)
						<td>{{$item->tipo}}</td>
						<td>{{$item->total}}</td> 
					@elseif($repor_id==2)
						<td>{{$item->month}}</td>
						<td>{{$item->tipo}}</td>
						<td>{{$item->total}}</td> 
					@elseif($repor_id==3)
						<td>{{$item->nombre}}</td>
						<td>{{$item->tipo}}</td>
						<td>{{$item->total}}</td> 
					@else
						<td>{{$item->month}}</td>
						<td>{{$item->nombre}}</td>
						<td>{{$item->tipo}}</td>
						<td>{{$item->total}}</td> 
				@endif
			</tr>
			@endforeach
		
	</table>
</div>

<p style="font-size: 11px">-------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</p>