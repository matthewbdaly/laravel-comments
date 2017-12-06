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
}
