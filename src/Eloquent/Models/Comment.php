<?php

namespace Matthewbdaly\LaravelComments\Eloquent\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Matthewbdaly\LaravelComments\Events\CommentBeingReceived;
use Matthewbdaly\LaravelComments\Events\CommentReceived;
use Matthewbdaly\LaravelComments\Eloquent\Scopes\CommentScope;

/**
 * Comment model
 */
class Comment extends Model
{
    use SoftDeletes;

    protected $dispatchesEvents = [
        'creating' => CommentBeingReceived::class,
        'created'  => CommentReceived::class,
    ];

    protected $fillable = [
        'comment',
        'user_id',
        'user_name',
        'user_email',
        'user_url',
        'ip_address',
        'commentable_id',
        'commentable_type',
    ];

    /**
     * Parent object
     *
     * @return Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function commentable()
    {
        return $this->morphTo();
    }

    /**
     * Flags
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function flags()
    {
        return $this->hasMany('Matthewbdaly\LaravelComments\Eloquent\Models\Comment\Flag');
    }

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new CommentScope);
    }
}
