<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    public function categories()
    {
       return $this->belongTo('app\Models\Categorie');
    }
    
    public function commentaires()
    {
       return $this->hasMany('app\Models\Commentaire');
    }
    
     public function users()
    {
       return $this->belongTo('app\User');
    }
}
