<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class MessageSent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $message;
    public $name;

    /**
     * Create a new event instance.
     */
    public function __construct($message, $name)
    {
        $this->message = $message;
        $this->name = $name;
    }


    public function broadcastAs()
    {
        return 'my-event';

    }

    public function broadcastWith()
    {
        return [
            'message' => $this->message,
            'name' => $this->name,
            ];
    }

    public function broadcastOn()
    {
        return new Channel('my-channel');
    }
}
