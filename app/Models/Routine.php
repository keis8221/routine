<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Askedio\SoftCascade\Traits\SoftCascadeTrait;

class Routine extends Model
{
    use SoftDeletes;
    use SoftCascadeTrait;
    
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

    protected $softCascade = ['comments'];

    Public function user() {
        return $this->BelongsTo('App\Models\User');
    }

    Public function action() {
        return $this->HasMany('App\Models\Action');
    }

    Public function likes() {
        return $this->belongsToMany(User::class, 'likes')->withTimestamps();
    }

    public function isLikedBy(?User $user): bool {
        return $user
            ? (bool)$this->likes->where('user_id', $user->id)->count()
            : false;
    }

    public function getCountLikesAttribute() {
        return $this->likes->count();
    }

    public function comments() {
        return $this->HasMany(Comment::class);
    }
}
