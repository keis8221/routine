<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_image',
        'self_introduction',
        'age',
        'sex',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    Public function routine() {
        return $this->hasMany('App\Models\Routine');
    }

    Public function likes() {
        return $this->belongsToMany(Routine::class, 'likes')->withTimestamps();
    }

    Public function follow() {
        return $this->belongsToMany('App\Models\Follow');
    }

}
