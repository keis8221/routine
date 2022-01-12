<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Routine extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'title',
        'routine_introduction'
    ];

    Public function user() {
        return $this->BelongsTo('App\Models\User');
    }

    Public function action() {
        return $this->HasMany('App\Models\Action');
    }
}
