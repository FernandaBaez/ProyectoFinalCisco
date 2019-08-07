<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{
    protected $table = 'instructor';
    protected $fillable = ['nombre', 'apellido', 'correo', 'id_academia', 'condicion'];

    public function academia(){
        return $this->belongsTo('App\Academia');
    }

    public function inscripcion()
    {
        return $this->hasMany('App\Inscripcion');
    }

}
