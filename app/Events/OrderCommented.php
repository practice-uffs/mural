<?php

namespace App\Events;

use App\Model\Comment;
use App\Model\Order;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class OrderCommented
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Order $order;
    public Comment $comment;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Order $order, Comment $comment)
    {
        $this->order = $order;
        $this->comment = $comment;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
