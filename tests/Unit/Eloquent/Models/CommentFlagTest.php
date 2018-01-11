<?php

namespace Tests\Unit\Eloquent\Models;

use Tests\TestCase;
use Matthewbdaly\LaravelComments\Eloquent\Models\Comment;
use Matthewbdaly\LaravelComments\Eloquent\Models\Comment\Flag;
use Matthewbdaly\LaravelComments\Events\CommentBeingFlagged;
use Matthewbdaly\LaravelComments\Events\CommentFlagged;
use Tests\Fixtures\User;
use Illuminate\Support\Facades\Event;

class CommentFlagTest extends TestCase
{
    public function testCreateComment()
    {
        Event::fake();
        $user = factory(User::class)->create();
        $comment = factory(Comment::class)->create([
            'commentable_id' => $user->id,
            'commentable_type' => get_class($user),
        ]);
        $flag = new Flag;
        $flag->comment_id = $comment->id;
        $flag->user_id = $user->id;
        $flag->reason = "Profanity";
        $flag->save();
        $this->assertEquals($flag->comment_id, $comment->id);
        $this->assertEquals($flag->reason, 'Profanity');
        $this->assertEquals($flag->comment->id, $comment->id);
        Event::assertDispatched(CommentBeingFlagged::class);
        Event::assertDispatched(CommentFlagged::class);
    }
}
