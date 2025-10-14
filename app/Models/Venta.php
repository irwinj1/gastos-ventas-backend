<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    //
    protected $table = "ventas";
    protected $fillable = [
        "id_user","id_entidad","total"
        ];



    public function detalle_ventas(){
        return $this->hasMany( DetalleVenta::class,"id_venta","id");
    }

   
    public function entidades(){
        return $this->belongsTo(Entidades::class,"id_entidad","id");
    }
}
