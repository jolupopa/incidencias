@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Bienvenido - Sistema de gestion de Incidencias</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <img src="/images/welcome.png" alt="Sistema de gestión de incidencias" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection