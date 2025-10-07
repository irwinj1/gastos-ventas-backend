<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //
    protected $table = "clientes";
    protected $fillable = ["nombre","telefono","direccion","dui","nit"];

    public function ventas(){
        return $this->hasMany(Venta::class,"id_cliente","id");
    }
}
