<?php

namespace Matthewbdaly\LaravelComments\Eloquent\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Matthewbdaly\LaravelComments\Events\CommentReceived;

/**
 * Comment model
 */
class Comment extends Model
{
    use SoftDeletes;

    protected $dispatchesEvents = [
        'saved' => CommentReceived::class
    ];

    protected $fillable = [
        'comment',
        'user_id',
        'user_name',
        'user_email',
        'user_url',
        'ip_address',
    ];

    public function commentable()
    {
        return $this->morphTo();
    }
}
