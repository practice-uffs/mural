<?php

namespace App\Listeners;

use App\Events\OrderCommented;
use App\Notifications\OrderCommented as OrderCommentedNotification;

class OrderEventSubscriber
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  OrderChanged  $event
     * @return void
     */
    public function handleOrderCommented(OrderCommented $event)
    {
        $orderOwner = $event->order->user;
        $commenter = $event->comment->user;

        if ($orderOwner->id == $commenter->id) {
            return;
        }

        $orderOwner->notify(new OrderCommentedNotification(
            $event->order,
            $event->comment
        ));
    }

    /**
     * Register the listeners for the subscriber.
     *
     * @param  \Illuminate\Events\Dispatcher  $events
     * @return void
     */
    public function subscribe($events)
    {
        $events->listen(
            OrderCommented::class,
            [OrderEventSubscriber::class, 'handleOrderCommented']
        );
    }
}
