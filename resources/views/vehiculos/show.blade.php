@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>CrearProducto</h1>
@stop

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="float-left">
                        <span class="card-title">Show Vehiculo</span>
                    </div>
                    <div class="float-right">
                        <a class="btn btn-primary" href="{{ route('vehiculos.index') }}"> Back</a>
                    </div>
                </div>

                <div class="card-body">

                    <div class="form-group">
                        <strong>Marca:</strong>
                        {{ $vehiculo->marca }}
                    </div>
                    <div class="form-group">
                        <strong>Modelo:</strong>
                        {{ $vehiculo->modelo }}
                    </div>
                    <div class="form-group">
                        <strong>Placa:</strong>
                        {{ $vehiculo->placa }}
                    </div>
                    <div class="form-group">
                        <strong>Color:</strong>
                        {{ $vehiculo->color }}
                    </div>
                    <div class="form-group">
                        <strong>Cliente Id:</strong>
                        {{ $vehiculo->cliente_id }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@stop

@section('css')
<!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
@stop

@section('js')
<!-- <script> console.log('Hi!'); </script> -->
@stop

