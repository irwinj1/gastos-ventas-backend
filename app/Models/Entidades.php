<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entidades extends Model
{
    protected $table = "entidades";
    protected $fillable = [
        'nombre',
        'apellido',
        'nombre_comercial',
        'dui',
        'nit',
        'n_registro',
        'email',
        'telefono',
        'direccion',
        'es_cliente',
        'es_proveedor',
    ];
    public function gastos(){
        return $this->hasMany(Gasto::class,'id_entidad','id');
    }
    public function ventas(){
        return $this->hasMany(Venta::class,'id_entidad','id');
    }
}
