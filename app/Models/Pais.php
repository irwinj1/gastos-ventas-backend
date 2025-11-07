<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    //
    protected $table = 'pais';

    protected $fillable = [
        'nombre','siglas','codigo_area','mask'
    ];

    public function departamantos(){
        return $this->hasMany(Departamento::class,'id_pais','id');
    }
}
