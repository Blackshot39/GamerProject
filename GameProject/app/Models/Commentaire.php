<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    public function sujets()
     {
     	return $this->belongsTo('App\Models\Sujet');
     }
    
    public function actualites()
     {
     	return $this->belongsTo('App\Models\Actualite');
     }

    public function users()
     {
     	return $this->belongsTo('App\User');
     }
}
