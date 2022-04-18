<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Like extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'routine_id'
    ];

    // Public function user() {
    //     this()->belongsTo('App\Models\User');
    // }

    // Public function routine() {
    //     this()->belongsTo('App\Models\Routine');
    // }
}
