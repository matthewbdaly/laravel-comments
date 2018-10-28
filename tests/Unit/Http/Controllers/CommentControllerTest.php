<?php

namespace Tests\Unit\Http\Controllers;

use Tests\TestCase;
use Illuminate\Support\Facades\Event;
use Matthewbdaly\LaravelComments\Http\Controllers\CommentController;
use Matthewbdaly\LaravelComments\Http\Requests\CommentRequest;
use Matthewbdaly\LaravelComments\Http\Requests\FlagRequest;
use Matthewbdaly\LaravelComments\Eloquent\Models\Comment;
use Tests\Fixtures\User;
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
        $comment = m::mock('Matthewbdaly\LaravelComments\Contracts\Repositories\Comment');
        $comment->shouldReceive('create')->once()->andReturn(true);
        $flag = m::mock('Matthewbdaly\LaravelComments\Contracts\Repositories\Comment\Flag');
        $controller = new CommentController($comment, $flag, $auth);
        $controller->store($request);
    }

    public function testStoreCommentWithoutUserId()
    {
        $user = factory(User::class)->create([]);
        $request = CommentRequest::create('/comments/submit', 'POST', [
            'email' => 'bob@example.com',
            'url' => 'http://example.com',
            'comment' => 'Hello there',
        ]);
        $auth = m::mock('Illuminate\Contracts\Auth\Guard');
        $auth->shouldReceive('user')->once()->andReturn($user);
        $comment = m::mock('Matthewbdaly\LaravelComments\Contracts\Repositories\Comment');
        $comment->shouldReceive('create')->once()->andReturn(true);
        $flag = m::mock('Matthewbdaly\LaravelComments\Contracts\Repositories\Comment\Flag');
        $controller = new CommentController($comment, $flag, $auth);
        $controller->store($request);
    }

    public function testFlagComment()
    {
        $request = FlagRequest::create('/comments/flag', 'POST', [
            'comment_id' => 1,
            'user_id' => 1,
            'reason' => 'Profanity',
        ]);
        $auth = m::mock('Illuminate\Contracts\Auth\Guard');
        $auth->shouldReceive('user')->once()->andReturn(null);
        $comment = m::mock('Matthewbdaly\LaravelComments\Contracts\Repositories\Comment');
        $flag = m::mock('Matthewbdaly\LaravelComments\Contracts\Repositories\Comment\Flag');
        $flag->shouldReceive('create')->once()->andReturn(true);
        $controller = new CommentController($comment, $flag, $auth);
        $controller->flag($request);
    }

    public function testFlagCommentWithoutUserId()
    {
        $user = factory(User::class)->create();
        $request = FlagRequest::create('/comments/flag', 'POST', [
            'comment_id' => 1,
            'reason' => 'Profanity',
        ]);
        $auth = m::mock('Illuminate\Contracts\Auth\Guard');
        $auth->shouldReceive('user')->once()->andReturn($user);
        $comment = m::mock('Matthewbdaly\LaravelComments\Contracts\Repositories\Comment');
        $flag = m::mock('Matthewbdaly\LaravelComments\Contracts\Repositories\Comment\Flag');
        $flag->shouldReceive('create')->once()->andReturn(true);
        $controller = new CommentController($comment, $flag, $auth);
        $controller->flag($request);
    }
}
