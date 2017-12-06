<?php

namespace Tests\Unit\Eloquent\Models;

use Tests\TestCase;
use Matthewbdaly\LaravelComments\Eloquent\Models\Comment;

class CommentTest extends TestCase
{
    public function testCreateComment()
    {
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
        $this->assertEqualsuals($comment->user_id, 1);
        $this->assertEqualsuals($comment->user_name, 'Bob Smith');
        $this->assertEqualsuals($comment->user_email, 'bob@example.com');
        $this->assertEqualsuals($comment->user_url, 'http://bob.com');
        $this->assertEqualsuals($comment->ip_address, '192.168.1.1');
        $this->assertEqualsuals($comment->is_public, true);
        $this->assertEqualsuals($comment->is_removed, false);
        $this->assertNotNull($comment->created_at);
        $this->assertNotNull($comment->updated_at);
    }
}
