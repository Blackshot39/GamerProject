<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jeu extends Model
{
    public function sujets()
     {
     	return $this->hasMany('App\Models\Sujet');
     }
    
    public function typeJeus()
     {
     //	return $this->belongsTo('App\Models\Type_Jeu');
        return $this->belongsToMany('App\Models\TypeJeu');
     }

    public function users()
     {
     	return $this->belongsToMany('App\Models\User');
     }
}
