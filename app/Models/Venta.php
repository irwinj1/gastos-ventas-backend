<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    //
    protected $table = "ventas";
    protected $fillable = [
        "id_user","id_entidad","total","fecha_factura","id_referencia"
        ];



    public function detalleVentas(){
        return $this->hasMany( DetalleVenta::class,"id_venta","id");
    }

   
    public function entidades(){
        return $this->belongsTo(Entidades::class,"id_entidad","id");
    }

    public function archivos(){
        return $this->belongsTo(Archivo::class,'id_referencia','id');
    }
}
