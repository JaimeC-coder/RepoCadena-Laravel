<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Proveedor
 *
 * @property $id
 * @property $RUC
 * @property $razonSocial
 * @property $direccion
 * @property $telefono
 * @property $email
 * @property $encargado
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Proveedor extends Model
{

    static $rules = [
		'RUC' => 'required',
		'razonSocial' => 'required',
		'direccion' => 'required',
		'telefono' => 'required',
		'email' => 'required',
		'encargado' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $table = 'proveedors';
    protected $primaryKey = 'id';
    protected $fillable = ['RUC','razonSocial','direccion','telefono','email','encargado'];



}
