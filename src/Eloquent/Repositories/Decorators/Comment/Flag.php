<?php

namespace Matthewbdaly\LaravelComments\Eloquent\Repositories\Decorators\Comment;

use Matthewbdaly\LaravelRepositories\Repositories\Decorators\BaseDecorator;
use Matthewbdaly\LaravelComments\Contracts\Repositories\Comment\Flag as FlagContract;
use Illuminate\Contracts\Cache\Repository as Cache;

/**
 * Flag decorator
 */
class Flag extends BaseDecorator implements FlagContract
{
    /**
     * Constructor
     *
     * @param FlagContract $repository The repository to wrap.
     * @param Cache        $cache      The cache instance.
     * @return void
     */
    public function __construct(FlagContract $repository, Cache $cache)
    {
        $this->repository = $repository;
        $this->cache = $cache;
    }
}
