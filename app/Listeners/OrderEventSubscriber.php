<?php

namespace App\Listeners;

use App\Events\OrderCommented;
use App\Jobs\ProcessCommentGithubIssue;
use App\Notifications\OrderCommented as OrderCommentedNotification;
use Illuminate\Support\Str;

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

        // O mural está integrado com o github, então temos que processar
        // esse comentário para decidir se ele vai ser postado (ou não) no github.
        $isCommentFromGithub = Str::contains($event->comment->type, 'github');

        if (!$isCommentFromGithub && isset($event->order->github_issue_link)) {
            ProcessCommentGithubIssue::dispatch($event->comment, $event->order->github_issue_link);
        }

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
