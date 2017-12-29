<?php

namespace Matthewbdaly\LaravelComments\Eloquent\Models\Comment;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Matthewbdaly\LaravelComments\Events\CommentFlagReceived;

/**
 * Comment model
 */
class Flag extends Model
{
    use SoftDeletes;

    protected $table = 'comment_flags';

    protected $dispatchesEvents = [
        'saved' => CommentFlagReceived::class
    ];

    protected $fillable = [
        'user_id',
        'comment_id',
        'reason',
    ];

    public function comment()
    {
        return $this->belongsTo('Matthewbdaly\LaravelComments\Eloquent\Models\Comment');
    }
}
