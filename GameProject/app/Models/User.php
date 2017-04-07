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
    
}
