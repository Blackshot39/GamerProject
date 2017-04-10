<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actualite extends Model
{
     public function categorie()
    {
       return $this->belongsTo('App\Models\Categorie');
    }
    
    public function commentaires() 
    {
       return $this->hasMany('App\Models\Commentaire');
    }
    
     public function user()
    {
       return $this->belongsTo('App\Models\User');
    }
}
