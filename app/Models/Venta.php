<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    //
    protected $table = "ventas";
    protected $fillable = [
        "id_user","id_cliente","total"
        ];


    public function clientes(){
        return $this->belongsTo(Cliente::class,"id_cliente","id");
    }

    public function detalle_ventas(){
        return $this->hasMany( DetalleVenta::class,"id_venta","id");
    }

    public function archivos(){
        return $this->hasMany(Archivo::class,"id_referencia","id");
    }
}
