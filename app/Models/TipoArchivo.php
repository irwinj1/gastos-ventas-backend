<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TipoArchivo extends Model
{
    //
    protected $table = "tipo_archivos";
    protected $fillable = ['nombre'];

    public function archivos(){
        return $this->hasMany(Archivo::class,'id_tipo_archivo','id');
    }
}
