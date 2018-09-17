@extends('layouts.app')

@section('content')




<div class="card">
    <div class="card-header text-white bg-primary">Editar Usuario</div>

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
            <label for="email">E-mail</label>
            <input type="email" class="form-control" name="email" placeholder="Correo electronico" readonly value="{{ old('email', $user->email ) }}">
        </div>

        <div class="form-group">
            <label for="name">Nombre</label>
            <input type="text" class="form-control" name="name" placeholder="Ingrese su nombre" value="{{ old('name', $user->name) }}">
        </div>

        <div class="form-group">
            <label for="password2">Contraseña...   <em class="text-danger">Ingresar si solo si desea modificar</em></label>
            <input type="text" class="form-control" name="password2">
        </div>



        <button type="submit" class="btn btn-primary">Guardar Usuario</button>
    </form>
    <hr>
    <form action="/proyecto-usuario" method="POST">
        {{ csrf_field() }}
        <input type="hidden" name="user_id" value="{{ $user->id }}">
        <div class="row">
            <div class="col-md-4">
                <select name="project_id" class="form-control" id="select-project">
                   <option value="">Seleccione un proyecto</option>
                   @foreach( $projects as $project)
                   <option value="{{ $project->id}}">{{ $project->name}}</option>
                   @endforeach
               </select>
           </div>
           <div class="col-md-4">
            <select name="level_id" class="form-control" id="select-level"><option value="">Seleccione nivel</option>
            </select>
        </div>
        <div class="col-md-4">
            <button class="btn btn-primary btn-block">Asignar Proyecto</button>
        </div>
    </div>
</form>
<hr>
<p>Proyectos Asignados</p>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Proyecto</th>
            <th>Nivel</th>
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($projects_user as $project_user)
        <tr>
            <td>{{ $project_user->project->name}}</td>
            <td>{{ $project_user->level->name}}</td>
            <td>
                <a href="" class="btn btn-sm btn-primary" title="Editar">
                    <span><i class="fas fa-pencil-alt "></i></span>
                </a>

                <form style="display:inline" method="POST" action="{{route('proy-user.delete', $project_user->id)}}">
                    {!! csrf_field() !!}
                    {!! method_field('DELETE') !!}
                    <button type="submit" class="btn btn-sm btn-danger">
                       <span><i class="fas fa-trash-alt "></i></span>
                   </button>
               </form>
           </td>
       </tr>
       @endforeach
   </tbody>
</table>
</div>
</div>



@endsection

@section('scripts')
<script src="/js/admin/users/edit.js" type="text/javascript"></script>

@endsection


