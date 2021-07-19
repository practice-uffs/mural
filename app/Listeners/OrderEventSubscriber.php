<?php

namespace App\Listeners;

use App\Events\OrderCommented;
use App\Events\OrderCompleted;
use App\Jobs\ProcessCommentGithubIssue;
use App\Model\Feedback;
use App\Model\OrderEvaluation;
use App\Notifications\OrderCommented as OrderCommentedNotification;
use App\Notifications\OrderCompleted as OrderCompletedNotification;
use Illuminate\Support\Facades\Hash;
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
     * Handle the event.
     *
     * @param  OrderCompleated  $event
     * @return void
     */
    public function handleOrderCompleted(OrderCompleted $event)
    {
        $orderOwner = $event->order->user;

        $feedback = Feedback::create([
            'user_id' => $orderOwner->id,
            'type' => 'comment',
            'comment' => '',
            'is_visible' => false
        ]);

        $evaluation = OrderEvaluation::create([
            'order_id' => $event->order->id,
            'feedback_id' => $feedback->id,
            'hash' => md5(Str::random(32)),
        ]);

        $orderOwner->notify(new OrderCompletedNotification($event->order, $evaluation));
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

        $events->listen(
            OrderCompleted::class,
            [OrderEventSubscriber::class, 'handleOrderCompleted']
        );
    }
}
