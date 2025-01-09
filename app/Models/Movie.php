<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
    use SoftDeletes;

    public function actors(): BelongsToMany {
        return $this->belongsToMany(Actor::class);
    }

    public function genres(){
        return $this->belongsToMany(Genre::class);
    }

    public function type(){
        return $this->hasOne(Type::class);
    }

    public function director(){
        return $this->hasOne(Director::class);
    }

    public function production(){
        return $this->hasOne(Production::class);
    }

    public function admins(){
        return $this->belongsToMany(Admin::class);
    }

    public function admin(){
        return $this->hasOne(Admin::class);
    }
}
