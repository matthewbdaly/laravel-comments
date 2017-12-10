<?php

namespace Matthewbdaly\LaravelComments\Eloquent\Traits;

trait Commentable
{
    public function comments()
    {
        return $this->morphMany('Matthewbdaly\LaravelComments\Eloquent\Models\Comment', 'commentable');
    }
}
