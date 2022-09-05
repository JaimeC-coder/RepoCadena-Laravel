@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>CrearProducto</h1>
@stop
@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Cliente</span>
                    </div>
                    <div class="card-body">
                        {{-- laravel colective form edit --}}
                        {!! Form::model($cliente, ['route' => ['clientes.update', $cliente], 'method' => 'PUT']) !!}

                        @include('clientes.form')
                        {!! Form::close() !!}


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
    <!-- <script>
        console.log('Hi!');
    </script> -->
@stop
