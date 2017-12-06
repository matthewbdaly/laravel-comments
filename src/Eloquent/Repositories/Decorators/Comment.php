<?php

namespace Matthewbdaly\LaravelComments\Eloquent\Repositories\Decorators;

use Matthewbdaly\LaravelRepositories\Repositories\Decorators\BaseDecorator;
use Matthewbdaly\LaravelComments\Contracts\Repositories\Comment as CommentContract;
use Illuminate\Contracts\Cache\Repository as Cache;

/**
 * Comment decorator
 */
class Comment extends BaseDecorator implements CommentContract
{
    /**
     * Constructor
     *
     * @param CommentContract $repository The repository to wrap.
     * @param Cache           $cache      The cache instance.
     * @return void
     */
    public function __construct(CommentContract $repository, Cache $cache)
    {
        $this->repository = $repository;
        $this->cache = $cache;
    }
}
