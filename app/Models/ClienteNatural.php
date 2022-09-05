<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClienteNatural extends Model
{
    use HasFactory;
    protected $table = 'cliente_naturals';
    protected $primaryKey = 'id';
    protected $fillable = ['cliente_id', 'nombre', 'apellido', 'dni', 'email', 'telefono', 'direccion'];
}
