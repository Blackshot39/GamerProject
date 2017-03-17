 <?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TypeJeu extends Model
{
    public function jeus() //faire relation pivot
    {
        return $this->belongsToMany('App\Models\Jeu');
    }
}
