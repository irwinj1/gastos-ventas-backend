<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    //
    protected $table = 'municipios';

    protected $fillable = [
        'nombre','id_departamento'
    ];

    public function departamentos(){
        return $this->belongsTo(Departamento::class,'id_departamento','id');
    }

    public function distritos(){
        return $this->hasMany(Distrito::class,'id_municipio','id');
    }
}
