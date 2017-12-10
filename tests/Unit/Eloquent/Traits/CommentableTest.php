<?php

namespace Tests\Unit\Eloquent\Traits;

use Tests\TestCase;
use Matthewbdaly\LaravelComments\Eloquent\Models\Comment;
use Matthewbdaly\LaravelComments\Events\CommentReceived;
use Illuminate\Support\Facades\Event;

class CommentableTest extends TestCase
{
    public function testCommentable()
    {
        Event::fake();
        $obj = new Comment;
        $obj->comment = 'Hello there';
        $obj->user_id = 1;
        $obj->user_name = 'Bob Smith';
        $obj->user_email = 'bob@example.com';
        $obj->user_url = 'http://bob.com';
        $obj->ip_address = '192.168.1.1';
        $obj->is_public = true;
        $obj->is_removed = false;
        $obj->save();
        $comment = Comment::first();
        $this->assertEquals($comment->comment, 'Hello there');
        $this->assertEquals($comment->user_id, 1);
        $this->assertEquals($comment->user_name, 'Bob Smith');
        $this->assertEquals($comment->user_email, 'bob@example.com');
        $this->assertEquals($comment->user_url, 'http://bob.com');
        $this->assertEquals($comment->ip_address, '192.168.1.1');
        $this->assertEquals($comment->is_public, 1);
        $this->assertEquals($comment->is_removed, 0);
        $this->assertNotNull($comment->created_at);
        $this->assertNotNull($comment->updated_at);
        Event::assertDispatched(CommentReceived::class);
    }
}
