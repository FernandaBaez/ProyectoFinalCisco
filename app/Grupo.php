<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
  protected $table = 'Grupos';

  protected $fillable = [
    'id_academia', 'id_curso', 'descripcion', 'fecha_creado'
  ];

  public function academia(){
    return $this->belongsTo('App\Academia');
  }

  public function inscripcion ()
  {
      return $this->hasMany('App\Inscripcion');
  }

}
