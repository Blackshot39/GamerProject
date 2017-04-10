<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
    public function messages()
    {
        return $this->hasMany('App\Models\User');
    }
    
    public function postes()
    {
        return $this->hasMany('App\Models\Poste');
    }
    
    public function commentaires()
    {
        return $this->hasMany('App\Models\Commentaire');
    }
    
    public function jeus()
    {
        return $this->belongsToMany('App\Models\Jeu')->withPivot('actif');
    }
    
    public function actualites()
    {
        return $this->hasMany('App\Models\Actualite');
    }
  
    
}
