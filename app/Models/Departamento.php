<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    //
    protected $table = 'departamentos';

    protected $fillable = [
        'nombre','id_pais'
    ];

    public function pais(){
        return $this->belongsTo(Pais::class,'id_pais','id');
    }

    public function municipios(){
        return $this->hasMany(Municipio::class,'id_departamento','id');
    }
}
