<?php

namespace Tests\Unit\Http\Controllers;

use Tests\TestCase;
use Illuminate\Support\Facades\Event;
use Matthewbdaly\LaravelComments\Http\Controllers\CommentController;
use Matthewbdaly\LaravelComments\Http\Requests\CommentRequest;
use Matthewbdaly\LaravelComments\Eloquent\Models\Comment;
use Mockery as m;

class CommentControllertest extends TestCase
{
    public function testStoreComment()
    {
        $request = CommentRequest::create('/comments/submit', 'POST', [
            'email' => 'bob@example.com',
            'url' => 'http://example.com',
            'comment' => 'Hello there',
        ]);
        $auth = m::mock('Illuminate\Contracts\Auth\Guard');
        $auth->shouldReceive('user')->once()->andReturn(null);
        $repo = m::mock('Matthewbdaly\LaravelComments\Contracts\Repositories\Comment');
        $repo->shouldReceive('create')->once()->andReturn(true);
        $controller = new CommentController($repo, $auth);
        $controller->store($request);
    }
}
