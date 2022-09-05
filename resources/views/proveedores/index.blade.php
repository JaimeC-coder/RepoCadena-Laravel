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
                            {{ __('Proveedor') }}
                        </span>

                        <div class="float-right">
                            <a href="{{ route('proveedores.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
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

                                    <th>Ruc</th>
                                    <th>Razonsocial</th>
                                    <th>Direccion</th>
                                    <th>Telefono</th>
                                    <th>Email</th>
                                    <th>Encargado</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($proveedors as $proveedor)
                                <tr>
                                    <td>{{ $proveedor->id }}</td>

                                    <td>{{ $proveedor->RUC }}</td>
                                    <td>{{ $proveedor->razonSocial }}</td>
                                    <td>{{ $proveedor->direccion }}</td>
                                    <td>{{ $proveedor->telefono }}</td>
                                    <td>{{ $proveedor->email }}</td>
                                    <td>{{ $proveedor->encargado }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary " href="{{ route('proveedores.show',$proveedor) }}"> Show</a>
                                        <a class="btn btn-sm btn-success" href="{{ route('proveedores.edit',$proveedor) }}"> Edit</a>

                                        <form action="{{ route('proveedores.destroy',$proveedor) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"> Delete</button>
                                        </form>
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

