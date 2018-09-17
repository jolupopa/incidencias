@extends('layouts.app')

@section('content')




<div class="card">
    <div class="card-header text-white bg-primary">Editar Proyecto</div>

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
            <input text="name" class="form-control" name="name"  value="{{ old('name',$project->name) }}">
        </div>

        <div class="form-group">
            <label for="description">Descripción</label>
            <input type="text" class="form-control" name="description"  value="{{ old('description', $project->description) }}">
        </div>

        <div class="form-group">
            <label for="start">Fecha de Inicio</label>
            <input type="date" class="form-control" name="start"  value="{{ old('start', $project->start) }}">
        </div>



        <button type="submit" class="btn btn-primary">Guardar Proyecto</button>
    </form>
    <hr>

    <div class="row">
        <div class="col-md-6">
            <p>Categorias</p>
            <form action="/categorias" method="POST" class="form-inline">
                {{ csrf_field() }}
                <input type="hidden" name="project_id" value="{{ $project->id}}">
                <div class="form-group">
                    <input type="text" placeholder="Ingrese la categoria" name="name" class="form-control">
                </div>
                <button class="btn btn-primary">Añadir</button>
            </form>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($categories as $category)
                    <tr>
                        <td>{{ $category->name }}</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-primary" title="Editar" data-myname="{{ $category->name }}" data-myid="{{$category->id}}" data-toggle="modal" data-target="#modalEditCategory">
                                <span><i class="fas fa-pencil-alt "></i></span>
                            </button>
                            <button type="button" class="btn btn-sm btn-danger" title="Eliminar" data-myname="{{ $category->name }}" data-myid="{{$category->id}}" data-toggle="modal" data-target="#modalDeleteCategory">
                                <span><i class="fas fa-trash-alt "></i></span>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        <div class="col-md-6">
            <p>Niveles</p>
            <form action="/niveles" method="POST" class="form-inline">
                {{ csrf_field() }}
                <input type="hidden" name="project_id" value="{{ $project->id}}">
                <div class="form-group">
                    <input type="text" placeholder="Ingrese el nivel" name="name" class="form-control">
                </div>
                <button class="btn btn-primary">Añadir</button>
            </form>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nivel</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($levels as $key => $level)
                    <tr>
                        <td>N{{ $key+1 }}</td>
                        <td>{{ $level->name }}</td>
                        <td>
                            <button type="button" class="btn btn-sm btn-primary" title="Editar" data-myname="{{ $level->name }}" data-myid="{{$level->id}}" data-toggle="modal" data-target="#modalEditLevel">
                                <span><i class="fas fa-pencil-alt "></i></span>
                            </button>
                            <a href="" class="btn btn-sm btn-danger" title="Eliminar" data-myname="{{ $level->name }}" data-myid="{{$level->id}}" data-toggle="modal" data-target="#modalDeleteLevel">
                                <span><i class="fas fa-trash-alt "></i></span>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

</div>
</div>

<div class="modal fade" tabindex="-1" role="dialog" id="modalEditCategory">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header"><h5 class="modal-title">Editar Categoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('category.update') }}" method="POST">
               @method('PATCH')
               @csrf

               <div class="modal-body">

                <input type="hidden" name="category_id" id="category_id" value="">
                <div class="form-group">
                    <label for="name">Nombre de la categoria</label>
                    <input type="text" name="name" id="name" class="form-control" value="">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button  class="btn btn-primary">Guardar cambios</button>
            </div>
        </form>
    </div>
</div>
</div> {{-- modal --}}

<div class="modal fade" tabindex="-1" role="dialog" id="modalEditLevel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header"><h5 class="modal-title">Editar Nivel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ url('/nivel/editar') }}" method="POST">
             @method('PATCH')
             @csrf
             <div class="modal-body">

                <input type="hidden" name="level_id" id="level_id" value="">
                <div class="form-group">
                    <label for="name">Nombre del Nivel</label>
                    <input type="text" name="name" id="name" class="form-control" value="">

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary">Guardar cambios</button>
            </div>
        </form>
    </div>
</div>
</div> {{-- modal --}}

<div class="modal fade" tabindex="-1" role="dialog" id="modalDeleteCategory">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-danger"><h5 class="modal-title">Eliminar Categoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('category.destroy') }}" method="POST">
                @method('DELETE')
                @csrf
                <div class="modal-body">

                    <input type="hidden" name="category_id" id="category_id" value="">
                    <div class="form-group">
                        <label for="name">Nombre de la Categoria</label>
                        <input type="text" name="name" id="name" class="form-control" value="">

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">No, Cancelar</button>
                    <button type="submit" class="btn btn-danger">Si, Eliminar</button>
                </div>
            </form>
        </div>
    </div>
</div> {{-- modal --}}

<div class="modal fade" tabindex="-1" role="dialog" id="modalDeleteLevel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header"><h5 class="modal-title">Eliminar Nivel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{ route('level.destroy') }}" method="POST">
             @method('DELETE')
             @csrf
             <div class="modal-body">

                <input type="hidden" name="level_id" id="level_id" value="">
                <div class="form-group">
                    <label for="name">Nombre del Nivel</label>
                    <input type="text" name="name" id="name" class="form-control" value="">

                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No, Cancelar</button>
                <button type="submit" class="btn btn-primary">Si, Eliminar</button>
            </div>
        </form>
    </div>
</div>
</div> {{-- modal --}}

@endsection

@section('scripts')

<script src="/js/admin/projects/edit.js"></script>

@endsection


