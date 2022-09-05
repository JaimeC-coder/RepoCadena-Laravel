<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class VehiculoProblema
 *
 * @property $id
 * @property $vehiculo_id
 * @property $problema_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Problema $problema
 * @property Vehiculo $vehiculo
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class VehiculoProblema extends Model
{
    
    static $rules = [
		'vehiculo_id' => 'required',
		'problema_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['vehiculo_id','problema_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function problema()
    {
        return $this->hasOne('App\Models\Problema', 'id', 'problema_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function vehiculo()
    {
        return $this->hasOne('App\Models\Vehiculo', 'id', 'vehiculo_id');
    }
    

}
