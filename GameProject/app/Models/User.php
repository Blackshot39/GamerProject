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
    
}
