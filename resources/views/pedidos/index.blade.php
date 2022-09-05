@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>CrearProducto</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Pedido') }}
                            </span>

                            <div class="float-right">
                                <a href="{{ route('pedidos.create') }}" class="btn btn-primary btn-sm float-right"
                                    data-placement="left">
                                    {{ __('Create New') }}
                                </a>
                            </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" id="table">
                                <thead class="thead">
                                    <tr>
                                        <th>#</th>

                                        <th>Cliente Id</th>
                                        <th>User Id</th>
                                        <th>Total</th>
                                        <th>Fecha</th>
                                        <th>Estado</th>

                                        <th  class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pedidos as $pedido)
                                        <tr>
                                            <td>{{ $pedido->id }}</td>

                                            <td>{{ $pedido->cliente()->first()->nombre }} {{ $pedido->cliente()->first()->apellido }}</td>
                                            <td>{{ $pedido->user()->first()->name }}</td>
                                            <td>{{ $pedido->total }}</td>
                                            <td>{{ $pedido->fecha }}</td>
                                            <td>{{ $pedido->estado }}</td>
                                            <td width='10px'>
                                                <a class="btn btn-sm btn-primary "
                                                    href="{{ route('pedidos.show', $pedido) }}">
                                                     Show</a>
                                                <a class="btn btn-sm btn-success"
                                                    href="{{ route('pedidos.edit', $pedido) }}">
                                                        Edit</a>
                                                {!! Form::open(['route' => ['pedidos.destroy', $pedido], 'method' => 'DELETE']) !!}

                                                <button class="btn btn-danger btn-sm" type="submit">Eliminar</button>
                                                {!! Form::close() !!}
                                            </td>


                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@stop

@section('css')
    <!-- <link rel="stylesheet" href="/css/admin_custom.css"> -->
@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('#table').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ]
            });

        });
    </script>
@stop
