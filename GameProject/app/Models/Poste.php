<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Poste extends Model
{
    //
     public function sujet()
     {
     	return $this->belongsTo('App\Models\Sujet');
     }

    public function user()
     {
     	return $this->belongsTo('App\Models\User');
     }
     
     public function users()
     {
     	return $this->belongsTo('App\Models\User');
     }
}
