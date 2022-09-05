<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Cliente;
use App\Models\DetallePedido;

/**
 * Class PedidoController
 * @package App\Http\Controllers
 */
class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pedidos = Pedido::all();

        return view('pedidos.index', compact('pedidos'))
        ;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
$productos = Producto::all();
$clientes = Cliente::all();
return view('pedidos.create', compact('productos', 'clientes'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // request()->validate(Pedido::$rules);
        $id_productos=$request->list_productos;
        $cantidad=$request->list_quantity;
        $precio=$request->list_precios;

        $pedido = Pedido::create([
            'cliente_id' => $request->cliente_id,
            'user_id' => $request->user_id,
            'fecha' => date('Y-m-d'),
            'estado' => 'Pendiente',
            'total' => $request->total,
        ]);
        for ($i=0; $i < sizeof($id_productos) ; $i++) {
            DetallePedido::create([
                'pedido_id' => $pedido->id,
                'producto_id' => $id_productos[$i],
                'cantidad' => $cantidad[$i],
                'precio' => $precio[$i],
            ]);
        }

        return redirect()->route('pedidos.index')
            ->with('success', 'Pedido created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedido)
    {
        $detalle_pedido = DetallePedido::where('pedido_id', $pedido->id)->get();
        return view('pedidos.show', compact('pedido', 'detalle_pedido'));

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido)
    {
        $productos = Producto::all();
        $clientes = Cliente::all();
        return view('pedidos.edit', compact('pedido', 'productos', 'clientes'));

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Pedido $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedido)
    {
        request()->validate(Pedido::$rules);

        $pedido->update($request->all());

        return redirect()->route('pedidos.index')
            ->with('success', 'Pedido updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Pedido $pedido)
    {
        $pedido->delete();
        return redirect()->route('pedidos.index')
            ->with('success', 'Pedido deleted successfully');
    }

}
