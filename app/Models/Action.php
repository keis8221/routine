<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Action extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'things',
        'routine_id',
        'minutes',
        'tool_name',
        'tool_url',
        'tool_image',
        'action_introduction'
    ];

    Public function Routine() {
        return $this->BelongsTo('App\Models\Routine');
    }
}
