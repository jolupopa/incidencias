@extends('layouts.app')

@section('content')


<div class="card">
    <div class="card-header text-white bg-primary">Lista de Proyectos</div>

    <div class="card-body">

        @if (session('notification'))
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

        <form action="" method="POST">
            {{ csrf_field() }}


            <div class="form-group">
                <label for="name">Nombre</label>
                <input text="name" class="form-control" name="name"  value="{{ old('name') }}">
            </div>

            <div class="form-group">
                <label for="description">Descripción</label>
                <input type="text" class="form-control" name="description"  value="{{ old('description') }}">
            </div>

            <div class="form-group">
                <label for="start">Fecha de Inicio</label>
                <input type="date" class="form-control" name="start"  value="{{ old('start', date('Y-m-d'))}}">
            </div>



            <button type="submit" class="btn btn-primary">Registrar Proyecto</button>
        </form>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>descripción</th>
                    <th>Inicio</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($projects as $project)
                <tr>
                    <td>{{ $project->name }}</td>
                    <td>{{ $project->description }}</td>
                    <td>{{ $project->start ?: 'No indicado' }}</td>
                    <td>

                        @if($project->trashed())
                        <a href="{{ url('/proyecto/' . $project->id .'/restaurar')}}" class="btn btn-sm btn-success" title="Restaurar">
                            <span><i class="fas fa-power-off  "></i></span>
                        </a>
                        @else
                        <a href="{{ url('/proyecto/' . $project->id )}}" class="btn btn-sm btn-primary" title="Editar">
                            <span><i class="fas fa-pencil-alt "></i></span>
                        </a>
                        <a href="{{ url('/proyecto/' . $project->id .'/eliminar')}}" class="btn btn-sm btn-danger" title="Eliminar">
                            <span><i class="fas fa-trash-alt "></i></span>
                        </a>
                        @endif


                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection


