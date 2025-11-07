<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Distrito extends Model
{
    //
    protected $table = 'distritos';

    protected $fillable = [
        'nombre', 'id_municipio'
    ];

    public function municipios(){
        return $this->belongsTo(Municipio::class,'id_municipio','id');
    }
    public function entidades(){
        return $this->hasMany(Entidades::class,'id_distrito','id');
    }
}
