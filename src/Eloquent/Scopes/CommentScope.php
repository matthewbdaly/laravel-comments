<?php

namespace Matthewbdaly\LaravelComments\Eloquent\Scopes;

use Illuminate\Database\Eloquent\Scope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * Scope the comments to exclude private and removed ones
 */
class CommentScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $builder The query builder instance.
     * @param  \Illuminate\Database\Eloquent\Model   $model   The model instance.
     * @return void
     */
    public function apply(Builder $builder, Model $model)
    {
        $builder->where('is_public', true)
            ->where('is_removed', false);
    }
}
