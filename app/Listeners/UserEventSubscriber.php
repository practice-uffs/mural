<?php

namespace App\Listeners;

use App\Events\OrderCommented;
use App\Events\UserCreated;
use App\Jobs\ProcessCommentGithubIssue;
use App\Model\Feedback;
use App\Model\OrderEvaluation;
use App\Notifications\OrderCommented as OrderCommentedNotification;
use App\Notifications\OrderCompleted as OrderCompletedNotification;
use App\Notifications\UserWelcome;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserEventSubscriber
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
     * @param  OrderCompleated  $event
     * @return void
     */
    public function handleUserCreated(UserCreated $event)
    {
        $event->user->notify(new UserWelcome());
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
            UserCreated::class,
            [UserEventSubscriber::class, 'handleUserCreated']
        );
    }
}
