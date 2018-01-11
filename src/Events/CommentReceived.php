<?php

namespace Matthewbdaly\LaravelComments\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Matthewbdaly\LaravelComments\Eloquent\Models\Comment as Model;

/**
 * Comment has been received
 */
class CommentReceived
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @param Model $model The model instance.
     * @return void
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }
}
