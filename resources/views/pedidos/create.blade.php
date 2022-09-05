@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>CrearProducto</h1>
@stop
@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Pedido</span>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pedidos.store') }}" method="POST">
                            @csrf
                            <div class="row">

                                <div class="col-6">

                                    <div class="form-group">
                                        <label for="clientes">Clientes</label>
                                        <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                        <select class="form-control" id="clientes" name="cliente_id" type="text">
                                            @foreach ($clientes as $cliente)
                                            <option value="{{ $cliente->id }}">
                                            @if ( $cliente->tipo ==='natural')
                                                {{$cliente->clienteNatural()->first()->nombre}}
                                            @else
                                                {{$cliente->clienteJuridico()->first()->razonSocial}}

                                            @endif
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="producto">producto</label>
                                        <select class="form-control" id="productos" type="text">
                                            @foreach ($productos as $producto)
                                            <option value="{{ $producto->id }}_{{ $producto->nombre }}_{{ $producto->precio }}_{{ $producto->cantidad}}">{{ $producto->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label class="d-flex flex-wrap align-content-center" for="quantiy">{{ __('Cantidad de Productos') }}</label>
                                        <input class="form-control" type="number" id="quantity" value="1" min="1"
                                            placeholder="number">
                                        <p id="error" class="text-danger font-weight-bold d-none">required</p>
                                    </div>
                                    <div class="form-group mt-2">
                                        <button class="btn btn-primary my-4" id="add"><i class="fa fa-fw fa-lg fa-plus"></i>Agregar</button>
                                    </div>

                                </div>
                            </div>
                            <div class="row d-flex justify-content-around">
                                <div class="col-6">
                                    <div class="tile-footer d-flex justify-content-around">

                                        <button class="btn btn-success" type="submit"><i class="fa fa-fw fa-lg fas fa-check"></i>Realizar Pedido</button>
                                    </div>
                                </div>
                            </div>


                            <div class="ml-3 col-md-5 d-none alert alert-danger" role="alert" id="error-exists"><strong>This
                                    producto is already added</strong></div>
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered" id="detalle">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre de producto</th>
                                            <th>Cantidad</th>
                                            <th>Precio </th>
                                            <th>SubTotal</th>
                                            <th>Quitar</th>
                                        </tr>
                                    </thead>
                                </table>
                                <label for="total">Total</label>
                                <input type="text" class="form-control" id="total" name="total" value="0" readonly>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @stop

@section('css')

@stop

@section('js')

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script type="text/javascript">

    $('#clientes').select2();
    $('#productos').select2();
    let index = 0;
    let i = 1;
    let total = 0;
    let list_producto = [];
    $('#total').html(total);
    $('#add').click(function(e) {
        e.preventDefault();
        let producto = $('#productos').val().split('_');
        let quantity = $('#quantity').val();
        if (validate(quantity, producto[0], producto[3])) {
            let row = '<tr id="row' + index + '"><td><input type="hidden" name="list_productos[]" value="' +
                producto[0] + '"><input type="hidden" name="list_quantity[]" value="' + quantity + '"><input type="hidden" name="list_precios[]" value="' + producto[2] + '">' + i++ +
                '</td><td>' + producto[1] + '</td><td>' + quantity + '</td><td>'+producto[2]+'</td><td>'+producto[2]*quantity+'</td><td><button onclick="remove(' +
                index + ' , ' + (producto[2] *
                    quantity) + ' )" class="btn btn-danger"><i class="fas fa-minus"></i></button></td></tr>';
            $('#error').removeClass('d-block');
            $('#detalle').append(row);
            total += (producto[2] * quantity);
            list_producto[index] = [producto[0]];
            $('#total').val(total);
            index++;
            $('#quantity').val(1);
            $('#error-exists').removeClass('d-block');
        }
    });

    function remove(row, price) {
        $('#row' + row).remove();
        total -= price;
        list_producto.splice(row);
        $('#total').html(total);
        index--;
        i--;
    }

    function validate(units, id, stock) {
        console.log(units + ' ' + stock);
        if (parseInt(units) <= parseInt(stock)) {
            if (parseInt(units) != 0) {
                for (let count = 0; count < list_producto.length; count++) {
                    const element = list_producto[count];
                    if (element == id) {
                        $('#error-exists').addClass('d-block');
                        return false;
                    }
                }
                return true;
            } else {
                $('#error').addClass('d-block');
                return false;
            }
        } else {
            $('#error-stock').addClass('d-block');
            return false;
        }
    }
</script>
@stop
