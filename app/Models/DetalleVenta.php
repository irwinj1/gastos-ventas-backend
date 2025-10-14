<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    //
    protected $table = "detalle_ventas";
    protected $fillable = ["id_venta","descripcion","cantidad","precio_unitario","ventas_afectadas"
    ];

    public function ventas(){
        return $this->hasMany(DetalleVenta::class,"id_venta","id");
    }
}
