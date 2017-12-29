<?php

namespace Matthewbdaly\LaravelComments\Eloquent\Traits;

trait Commentable
{
    /**
     * Comments relation
     *
     * @return Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function comments()
    {
        return $this->morphMany('Matthewbdaly\LaravelComments\Eloquent\Models\Comment', 'commentable');
    }
}
