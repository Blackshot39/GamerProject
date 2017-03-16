<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    public function actualites()
    {
       return $this->hasMany('App\Models\Actualite');
    }
}
