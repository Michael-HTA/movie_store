<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function movies(){
        return $this->hasMany(Movie::class);
    }
}
