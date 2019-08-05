<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Academia extends Model
{
    protected $table = 'academia';
    protected $fillable = ['nombre', 'direccion', 'direccion2', 'pais', 'estado', 'ciudad', 'cp', 'sitio', 'tipo', 'condicion'];

    public function grupos ()
    {
        return $this->hasMany('App\Grupo');
    }

    /*public function contacto(){
        return $this->belongsTo('App\Contacto');
    }*/
}
