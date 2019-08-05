<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
  protected $table = 'Grupos';

  protected $fillable = [
    'id_academia', 'nombre', 'descripcion'
  ];

  public function academia(){
    return $this->belongsTo('App\Academia');
  }

}
