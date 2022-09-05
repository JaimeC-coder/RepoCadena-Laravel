<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallePedido extends Model
{
    use HasFactory;
    protected $table = 'detalle_pedidos';
    protected $primaryKey = 'id';
    protected $fillable = ['pedido_id', 'producto_id', 'cantidad', 'precio'];
    protected $rules = [
        'pedido_id' => 'required',
        'producto_id' => 'required',
        'cantidad' => 'required',
        'precio' => 'required',
    ];
    protected $messages = [
        'pedido_id.required' => 'El campo pedido es obligatorio',
        'producto_id.required' => 'El campo producto es obligatorio',
        'cantidad.required' => 'El campo cantidad es obligatorio',
        'precio.required' => 'El campo precio es obligatorio',
    ];
    public function pedido()
    {
        return $this->belongsTo(Pedido::class);
    }
    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }



}
