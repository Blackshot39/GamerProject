<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    public function news()
    {
       return $this->hasMany('app\Models\Categorie');
    }
}
