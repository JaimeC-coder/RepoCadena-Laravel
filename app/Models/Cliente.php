<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cliente
 *
 * @property $id
 * @property $dni
 * @property $nombre
 * @property $apellido
 * @property $email
 * @property $telefono
 * @property $direccion
 * @property $created_at
 * @property $updated_at
 *
 * @property Pedido[] $pedidos
 * @property Vehiculo[] $vehiculos
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Cliente extends Model
{

    static $rules = [
		'tipo' => 'required'
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $table = 'clientes';
    protected $primaryKey = 'id';
    protected $fillable = ['tipo'];



    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pedidos()
    {
        return $this->hasMany('App\Models\Pedido', 'cliente_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vehiculos()
    {
        return $this->hasMany('App\Models\Vehiculo', 'cliente_id', 'id');
    }

    //relacion con la tabla cliente_natural
    public function clienteNatural()
    {
        return $this->hasOne('App\Models\ClienteNatural', 'cliente_id', 'id');
    }
    //relacion con la tabla cliente_juridico
    public function clienteJuridico()
    {
        return $this->hasOne('App\Models\ClienteJuridico', 'cliente_id', 'id');
    }

}
