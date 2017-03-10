<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jeu extends Model
{
    public function sujets()
     {
     	return $this->hasMany('App\Models\Sujet');
     }
    
    public function type_jeus()
     {
     	return $this->belongsTo('App\Models\Type_Jeu');
     }

    public function users()
     {
     	return $this->hasMany('App\User');
     }
}
