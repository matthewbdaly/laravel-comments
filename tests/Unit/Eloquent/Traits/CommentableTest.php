<?php

namespace Tests\Unit\Eloquent\Traits;

use Tests\TestCase;
use Matthewbdaly\LaravelComments\Eloquent\Models\Comment;
use Matthewbdaly\LaravelComments\Events\CommentReceived;
use Tests\Fixtures\User;
use Illuminate\Support\Facades\Event;

class CommentableTest extends TestCase
{
    public function testCommentable()
    {
        Event::fake();
        $user = factory(User::class)->create();
        $obj = new Comment;
        $obj->comment = 'Hello there';
        $obj->user_id = 1;
        $obj->user_name = 'Bob Smith';
        $obj->user_email = 'bob@example.com';
        $obj->user_url = 'http://bob.com';
        $obj->ip_address = '192.168.1.1';
        $obj->is_public = true;
        $obj->is_removed = false;
        $obj->commentable_id = $user->id;
        $obj->commentable_type = get_class($user);
        $obj->save();
        Event::assertDispatched(CommentReceived::class);
        $this->assertEquals('Hello there', $user->comments->first()->comment);
        $comment = Comment::first();
        $this->assertEquals($user->name, $comment->commentable->name);
    }
}
