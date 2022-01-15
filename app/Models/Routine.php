<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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

    Public function like() {
        return $this->HasMany('App\Models\Like');
    }

    public function isLikedBy(?User $user): bool
    {
        return $user
            ? (bool)$this->like->where('id', $user->id)->count()
            : false;
    }

    public function getCountLikesAttribute(): int
    {
        return $this->like->count();
    }
}
