<?php

namespace App\Listeners;

use App\Events\OrderCommented;
use App\Events\OrderCompleted;
use App\Events\OrderCreated;
use App\Jobs\ProcessCommentGithubIssue;
use App\Models\Feedback;
use App\Models\OrderEvaluation;
use App\Notifications\OrderCommented as OrderCommentedNotification;
use App\Notifications\OrderCompleted as OrderCompletedNotification;
use App\Notifications\OrderCreated as OrderCreatedNotification;
use App\Services\GoogleDrive;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class OrderEventSubscriber
{
    protected GoogleDrive $drive;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(GoogleDrive $drive)
    {
        $this->drive = $drive;
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
     * Handle the event.
     *
     * @param  OrderCompleated  $event
     * @return void
     */
    public function handleOrderCreated(OrderCreated $event)
    {
        $order = $event->order;
        $folders = $this->drive->createIssueWorkingFolder($order->id, 'mural');
    
        if($folders == null) {
            Log::error('Não foi possível criar a pasta no Google Drive para pedido: ' . $order->id);
            return;
        }

        $drive_link = isset($folders['folder']) ? $folders['folder']->getWebViewLink() : '';
        $drive_in_link = isset($folders['in']) ? $folders['in']->getWebViewLink() : '';
        $drive_out_link = isset($folders['out']) ? $folders['out']->getWebViewLink() : '';

        $order->update([
            'google_drive_folder_link' => $drive_link,
            'google_drive_in_folder_link' => $drive_in_link,
            'google_drive_out_folder_link' => $drive_out_link,
        ]);

        $order->user->notify(new OrderCreatedNotification($order));
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

        $events->listen(
            OrderCreated::class,
            [OrderEventSubscriber::class, 'handleOrderCreated']
        );        
    }
}
