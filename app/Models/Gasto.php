<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{
    //
    protected $table = "gastos";
    protected $fillable = [
        "id_usuario",
        "descripcion",
        "monto"
        ];
    
    public function archivos(){
        return $this->hasMany(Archivo::class,"id_referencia","id");
    } 
    public function entidad(){
        return $this->belongsTo(Entidades::class,"id_entidad","id");
    }

}
