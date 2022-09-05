<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClienteJuridico extends Model
{
    use HasFactory;
    protected $table = 'cliente_juridicos';
    protected $primaryKey = 'id';
    protected $fillable = ['cliente_id','ruc', 'razonSocial', 'encargado', 'email', 'telefono', 'direccion'];
}
