<?php

namespace Matthewbdaly\LaravelComments\Eloquent\Repositories\Comment;

use Matthewbdaly\LaravelRepositories\Repositories\Base;
use Matthewbdaly\LaravelComments\Contracts\Repositories\Comment\Flag as FlagContract;
use Matthewbdaly\LaravelComments\Eloquent\Models\Comment\Flag as Model;

/**
 * Flag repository
 */
class Flag extends Base implements FlagContract
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
