<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    //
    protected $table = "archivos";
    protected $fillable = [
        "id_tipo_archivo",
        "id_referencia",
        "nombre_archivo",
        "ruta",
        "extension",
        "tamanio",
    ];

    public function ventas(){
        return $this->hasMany(Venta::class,"id_referencia","id");
    }
    public function gastos(){
        return $this->hasMany(Gasto::class,"id_referencia","id");
    }
}
