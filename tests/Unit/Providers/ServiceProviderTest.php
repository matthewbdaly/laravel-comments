<?php

namespace Tests\Unit\Providers;

use Mockery as m;
use Tests\TestCase;

class ServiceProviderTest extends TestCase
{
    /** @test */
    public function it_sets_up_the_comments_repository()
    {
        $repo = $this->app->make('Matthewbdaly\LaravelComments\Contracts\Repositories\Comment');
        $this->assertInstanceOf(\Matthewbdaly\LaravelComments\Eloquent\Repositories\Decorators\Comment::class, $repo);
    }

    /** @test */
    public function it_sets_up_the_flag_repository()
    {
        $repo = $this->app->make('Matthewbdaly\LaravelComments\Contracts\Repositories\Comment\Flag');
        $this->assertInstanceOf(\Matthewbdaly\LaravelComments\Eloquent\Repositories\Decorators\Comment\Flag::class, $repo);
    }
}
