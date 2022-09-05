<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Problema
 *
 * @property $id
 * @property $nombre
 * @property $descripcion
 * @property $created_at
 * @property $updated_at
 *
 * @property VehiculoProblema[] $vehiculoProblemas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Problema extends Model
{

    static $rules = [
		'nombre' => 'required',
		'descripcion' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $table = 'problemas';
    protected $primaryKey = 'id';
    protected $fillable = ['nombre','descripcion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function vehiculoProblemas()
    {
        return $this->hasMany('App\Models\VehiculoProblema', 'problema_id', 'id');
    }


}
