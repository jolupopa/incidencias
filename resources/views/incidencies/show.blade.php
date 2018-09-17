@extends('layouts.app')

@section('content')


<div class="card">
	<div class="card-header text-white bg-primary">Dashboard</div>

	<div class="card-body">
		@if( session('notification'))
		<div class="alert alert-success">
			{{ session('notification')}}
		</div>
		@endif

		@if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
		@endif

		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Código</th>
					<th>Proyecto</th>
					<th>Categoria</th>
					<th>Fecha de envio</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td id="incidency_key">{{ $incidency->id }}</td>
					<td id="incidency_project">{{ $incidency->project->name }}</td>
					<td id="incidency_category">{{ $incidency->category_name }}</td>
					<td id="incidency_created_at">{{ $incidency->created_at }}</td>
				</tr>
			</tbody>
			<thead>
				<tr>
					<th>Asignada a</th>
					<th>Nivel</th>
					<th>Estado</th>
					<th>Severidad</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td id="incidency_responsible">{{ $incidency->support_name}}</td>
					<td >{{ $incidency->level->name }}</td>
					<td id="incidency_state">{{ $incidency->state }}</td>
					<td id="incidency_severity">{{ $incidency->severity_full}}</td>
				</tr>
			</tbody>

		</table>
		<table class="table table-bordered">
			<tbody>
				<tr>
					<th>Titulo</th>
					<td id="incidency_sumary">{{ $incidency->title}}</td>
				</tr>
				<tr>
					<th>Descripción</th>
					<td id="incidency_description">{{ $incidency->description}}</td>
				</tr>
				<tr>
					<th>Adjuntos</th>
					<td id="incidency_attachment">No se han adjuntado archivos</td>
				</tr>
			</tbody>
		</table>
		@if( $incidency->support_id == null && $incidency->active && auth()->user()->canTake($incidency))
		<a href="/incidencia/{{ $incidency->id}}/atender" class="btn btn-primary" id="incidency_btn_apply">Atender Incidencia</a>
		@endif
		@if( auth()->user()->id == $incidency->client_id)
		@if($incidency->active)
		<a href="/incidencia/{{ $incidency->id}}/resolver" class="btn btn-info" id="incidency_btn_solve">Marcar como Resuelto</a>
		<a href="/incidencia/{{ $incidency->id}}/editar" class="btn btn-success" id="incidency_btn_edit">Editar Incidencia</a>
		@else
		<a href="/incidencia/{{ $incidency->id}}/abrir" class="btn btn-warning" id="incidency_btn_open">Volver abrir</a>
		@endif
		@endif

		@if( auth()->user()->id == $incidency->support_id && $incidency->active)
		<a href="/incidencia/{{ $incidency->id}}/derivar" class="btn btn-danger" id="incidency_btn_derive">Derivar a siguiente nivel</a>
		@endif
	</div>
</div>

@include('layouts.chat')
@endsection



