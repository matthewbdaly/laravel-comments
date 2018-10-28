<?php

namespace Tests\Feature;

use Tests\BrowserKitTestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Matthewbdaly\LaravelComments\Eloquent\Models\Comment;
use Tests\Fixtures\User;

class CommentsTest extends BrowserKitTestCase
{
    public function testPostComment()
    {
        $user = factory(User::class)->create([]);
        $params = [
            'email' => 'bob@example.com',
            'url' => 'http://example.com',
            'comment' => 'Hello there',
        ];
        $response = $this->call('POST', '/comments/submit', $params);
        $this->assertEquals(302, $response->status());
    }

    public function testPostFlag()
    {
        $user = factory(User::class)->create([]);
        $comment = factory(Comment::class)->create([
            'commentable_id' => $user->id,
            'commentable_type' => get_class($user)
        ]);
        $params = [
            'comment_id' => $comment->id,
            'user_id' => $user->id,
            'reason' => 'Profanity',
        ];
        $response = $this->call('POST', '/comments/flag', $params);
        $this->assertEquals(302, $response->status());
    }
}
