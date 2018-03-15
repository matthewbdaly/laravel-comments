<?php

namespace Matthewbdaly\LaravelComments\Eloquent\Models\Comment;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Matthewbdaly\LaravelComments\Events\CommentBeingFlagged;
use Matthewbdaly\LaravelComments\Events\CommentFlagged;

/**
 * Flag model
 */
class Flag extends Model
{
    use SoftDeletes;

    protected $table = 'comment_flags';

    protected $dispatchesEvents  = [
        'creating'              => CommentBeingFlagged::class,
        'created'               => CommentFlagged::class,
    ];

    protected $fillable = [
        'user_id',
        'comment_id',
        'reason',
    ];

    /**
     * Comment relation
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function comment()
    {
        return $this->belongsTo('Matthewbdaly\LaravelComments\Eloquent\Models\Comment');
    }
}
