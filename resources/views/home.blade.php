@extends('layouts.app')

@section('content')

<div class="card">
	<div class="card-header text-white bg-primary">Dashboard</div>
	@if (session('status'))
	<div class="alert alert-success" role="alert">
		{{ session('status') }}
	</div>
	@endif

	<div class="card-body">

		@if(auth()->user()->is_support)
		<div class="card">
			<div class="card-header bg-success text-center text-white">
				<h5>Incidencias asignadas a mi.</h5>
			</div>
			<div class="card-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Código</th>
							<th>Categoria</th>
							<th>Severidad</th>
							<th>Estado</th>
							<th>Fecha creación</th>
							<th>Titulo</th>

						</tr>
					</thead>
					<tbody id="dashboard_my_incidents">
						@foreach($my_incidents as $incident)
						<tr>
							<td>
								<a href="/ver/{{$incident->id}}">
									{{$incident->id}}
								</a>
							</td>
							<td>{{$incident->category_name}}</td>
							<td>{{$incident->severity_full}}</td>
							<td>{{$incident->state}}</td>
							<td>{{$incident->created_at}}</td>
							<td>{{$incident->title_short}}</td>
						</tr>

						@endforeach
					</tbody>
				</table>
			</div>
		</div>

		<div class="card">
			<div class="card-header bg-success text-center text-white">
				<h5>Incidencias sin asignar.</h5>
			</div>
			<div class="card-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Código</th>
							<th>Categoria</th>
							<th>Severidad</th>
							<th>Estado</th>
							<th>Fecha creación</th>
							<th>Titulo</th>
							<th>Opción</th>
						</tr>
					</thead>
					<tbody id="dashboard_pending_incidents">
						@foreach($pending_incidents as $incident)
						<tr>
							<td>
								<a href="/ver/{{$incident->id}}">
									{{$incident->id}}
								</a>
							</td>
							<td>{{$incident->category_name}}</td>
							<td>{{$incident->severity_full}}</td>
							<td>{{$incident->state}}</td>
							<td>{{$incident->created_at}}</td>
							<td>{{$incident->title_short}}</td>
							<td>
								<a href="" class="btn btn-primary btn-sm">Atender</a>
							</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		@endif

		<div class="card">
			<div class="card-header bg-success text-center text-white">
				<h5>Incidencias reportadas por mi. </h5>
			</div>
			<div class="card-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Código</th>
							<th>Categoria</th>
							<th>Severidad</th>
							<th>Estado</th>
							<th>Fecha creación</th>
							<th>Titulo</th>
							<th>Responsable</th>
						</tr>
					</thead>
					<tbody id="dashboard_by_me">
						@foreach($incidents_by_me as $incident)
						<tr>
							<td>
								<a href="/ver/{{$incident->id}}">
									{{$incident->id}}
								</a>
							</td>
							<td>{{$incident->category_name}}</td>
							<td>{{$incident->severity_full}}</td>
							<td>{{$incident->state}}</td>
							<td>{{$incident->created_at}}</td>
							<td>{{$incident->title_short}}</td>
							<td>{{$incident->support_id ?: 'Sin asignar'}}</td>
						</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>







	</div>
</div>

@endsection
