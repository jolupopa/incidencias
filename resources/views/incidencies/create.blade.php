@extends('layouts.app')

@section('content')


<div class="card">
    <div class="card-header text-white bg-primary">Dashboard</div>

    <div class="card-body">

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
                <label for="category_id">Categoria</label>
                <select class="form-control" name="category_id" >
                    <option value="">General</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="severity">Severidad</label>
                <select class="form-control" name="severity" >
                    <option  value="M">Menor</option>
                    <option  value="N">Normal</option>
                    <option  value="A">Alta</option>
                </select>
            </div>

            <div class="form-group">
                <label for="title">Titulo</label>
                <input type="text" class="form-control" name="title" placeholder="Titulo" value="{{ old('title') }}">
            </div>

            <div class="form-group">
                <label for="description">Descripción</label>
                <textarea class="form-control" name="description" rows="3">{{ old('description') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Registrar Incidencias</button>
        </form>
    </div>
</div>


@endsection


