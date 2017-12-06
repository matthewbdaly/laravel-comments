<?php

namespace Matthewbdaly\LaravelComments\Eloquent\Repositories;

use Matthewbdaly\LaravelRepositories\Repositories\Base;
use Matthewbdaly\LaravelComments\Contracts\Repositories\Comment as CommentContract;
use Matthewbdaly\LaravelComments\Eloquent\Models\Comment as Model;

/**
 * Comment repository
 */
class Comment extends Base implements CommentContract
{
    /**
     * Constructor
     *
     * @param Model $model The model for the repository.
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }
}
