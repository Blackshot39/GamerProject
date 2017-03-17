<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Actualite extends Model
{
     public function categories()
    {
       return $this->belongsTo('App\Models\Categorie');
    }
    
    public function commentaires() 
    {
       return $this->hasMany('App\Models\Commentaire');
    }
    
     public function users()
    {
       return $this->belongsTo('App\Models\User');
    }
}
