<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
     protected $table = 'Inscripcion';
     protected $fillable = ['id_instructor', 'id_grupo', 'estado','condicion'];

    public function instructor(){
        return $this->belongsTo('App\Instructor');
    }

    public function grupo(){
        return $this->belongsTo('App\Grupo');
    }
}
