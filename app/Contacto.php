<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contacto extends Model
{
     protected $table = 'contacto';
     protected $fillable = ['nombre', 'apellido', 'correo', 'cargo', 'pais', 'telefono', 'extension', 'idioma', 'id_usuario', 'id_academia', 'condicion'];
  
    public function usuario(){
        return $this->belongsTo('App\Usuario');
    }
   
    public function academia(){
        return $this->belongsTo('App\Academia');
    }
}
