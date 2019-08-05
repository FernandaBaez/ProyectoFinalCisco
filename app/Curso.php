<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
  protected $table = 'Cursos';
  protected $fillable = ['nombre','descripcion', 'condicion'];


}
