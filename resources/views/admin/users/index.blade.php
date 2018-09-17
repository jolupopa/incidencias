@extends('layouts.app')

@section('content')


<div class="card">
    <div class="card-header text-white bg-primary">Lista de Usuarios</div>

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
                <input type="email" class="form-control" name="email" placeholder="Correo electronico" value="{{ old('email') }}">
            </div>

            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" name="name" placeholder="Ingrese su nombre" value="{{ old('name') }}">
            </div>

            <div class="form-group">
                <label for="password">Contraseña</label>
                <input type="text" class="form-control" name="password"  value="{{ old('password', str_random(8)) }}">
            </div>



            <button type="submit" class="btn btn-primary">Registrar Usuario</button>
        </form>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>E-mail</th>
                    <th>Nombre</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->name }}</td>
                    <td>
                        <a href="{{ url('/usuario/' . $user->id )}}" class="btn btn-sm btn-primary" title="Editar">
                            <span><i class="fas fa-pencil-alt "></i></span>
                        </a>
                        <a href="{{ url('/usuario/' . $user->id .'/eliminar')}}" class="btn btn-sm btn-danger" title="Eliminar">
                            <span><i class="fas fa-trash-alt "></i></span>
                        </a>


                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection


