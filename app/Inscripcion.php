<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inscripcion extends Model
{
     protected $table = 'instructor_curso';
     protected $fillable = ['id_instructor', 'id_curso', 'requiere_orientacion',  'fecha_s',  'horario',  'fecha_p','condicion'];
  
    public function instructor(){
        return $this->belongsTo('App\Instructor');
    }
   
    public function curso(){
        return $this->belongsTo('App\Curso');
    }
}
