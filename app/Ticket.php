<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
     protected $table = 'ticket';
     protected $fillable = ['id_contacto', 'asunto'];
  
    
    public function contacto(){
        return $this->belongsTo('App\Contacto');
    }
}
