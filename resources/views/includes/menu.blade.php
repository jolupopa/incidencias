<div class="card">
	<div class="card-header text-white bg-primary">Menú</div>

	<div class="card-body">
		<div class="list-group">
			<ul class="nav nav-pills flex-column">
				@if( auth()->check())
				<li class="nav-item active">
					<a @if(request()->is('home')) class="nav-link active" @else class="nav-link" @endif  href="/home">Dashboard</a>
				</li>
				@if(! auth()->user()->is_client)
				<li class="nav-item">
					<a class="nav-link my-2 " href="/ver">Ver Incidencias</a>
				</li>
				@endif
				<li class="nav-item">
					<a @if(request()->is('reportar')) class="nav-link active mb-2" @else class="nav-link mb-2" @endif href="/reportar">Reportar Incidencias</a>
				</li>


				@if(auth()->user()->is_admin)
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Administración</a>
					<div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 39px, 0px);">
						<a class="dropdown-item" href="{{ url('usuarios')}}">Usuarios de Soporte </a>
						<a class="dropdown-item my-2" href="#">Clientes</a>
						<a class="dropdown-item my-2" href="#">Administradores</a>
						<a class="dropdown-item mb-2" href="{{ url('proyectos')}}">Proyectos</a>
						<a class="dropdown-item" href="#">Configuración</a>
					</div>
				</li>
				@endif
				@else

				<li class="nav-item ">
					<a class="nav-link active" href="/">Bienvenido</a>
				</li>
				<li class="nav-item my-2">
					<a class="nav-link " href="/instrucciones">Instrucciones</a>
				</li>
				<li class="nav-item">
					<a class="nav-link " href="/acerca-de">Creditos</a>
				</li>
				@endif
			</ul>
		</div>
	</div>
</div>


