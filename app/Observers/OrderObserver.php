<?php

namespace App\Observers;

use App\Events\OrderCommented;
use App\Events\OrderCompleted;
use App\Events\OrderCreated;
use App\Models\Order;
use App\Notifications\OrderNeedsReview;
use App\Notifications\OrderStarted;

class OrderObserver
{
    /**
     * Listen to the Order created event.
     *
     * @param  \App\Order  $order
     * @return void
     */
    public function created(Order $order)
    {
        OrderCreated::dispatch($order);
    }

    /**
     * Listen to the Order created/updated event.
     *
     * @param  \App\Order  $order
     * @return void
     */
    public function saving(Order $order)
    {
    }


    /**
     * Listen to the Order created/updated event.
     *
     * @param  \App\Order  $order
     * @return void
     */
    public function saved(Order $order)
    {
        $statusChanged = $order->getOriginal('status') !== $order->status;
        $wasGithubLinkAdded = $order->getOriginal('github_issue_link') !== $order->github_issue_link;

        if ($wasGithubLinkAdded) {
            $order->user->notify(new OrderStarted($order));
            return;
        }        

        if (!$statusChanged) {
            return;
        }

        if ($order->status == 'review') {
            $order->user->notify(new OrderNeedsReview($order));

        } else if ($order->status == 'completed') {
            OrderCompleted::dispatch($order);
        }
    }
}