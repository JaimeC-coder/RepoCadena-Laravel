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
                            <span class="card-title">Show Vehiculo Problema</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('vehiculo-problemas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">

                        <div class="form-group">
                            <strong>Vehiculo Id:</strong>
                            {{ $vehiculoProblema->vehiculo_id }}
                        </div>
                        <div class="form-group">
                            <strong>Problema Id:</strong>
                            {{ $vehiculoProblema->problema_id }}
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