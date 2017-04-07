<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sujet extends Model
{
//    public function commentaires()
//     {
//     	return $this->hasMany('App\Models\Commentaire');
//     }
    
    public function jeus()
     {
     	return $this->belongsTo('App\Models\Jeu');
     }
     
     public function jeu()
     {
     	return $this->belongsTo('App\Models\Jeu');
     }

    public function users()
     {
     	return $this->belongsTo('App\Models\User');
     }
     
      public function postes()
     {
     	return $this->hasMany('App\Models\Poste');
     }
     
     public function poste()
     {
     	return $this->hasMany('App\Models\Poste');
     }
     
}
