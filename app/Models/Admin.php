<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Model
{

    use HasFactory, SoftDeletes;


    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
        'user_id',
    ];

    public function role(){
        return $this->belongsTo(Role::class);
    }

    public function createdMovies(){
        return $this->hasMany(Movie::class);
    }

    public function genre(){
        return $this->belongsToMany(Genre::class);
    }

    public function movies(){
        return $this->belongsToMany(Movie::class);
    }
}
