<?php

namespace App\Notifications;

use App\Model\Comment;
use App\Model\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderCommented extends Notification implements ShouldQueue
{
    use Queueable;

    protected Order $order;
    protected Comment $comment;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Order $order, Comment $comment)
    {
        $this->order = $order->withoutRelations();
        $this->comment = $comment->withoutRelations();
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('Nova movimentação (Practice Mural #' . $this->order->id . ')')
                    ->greeting('Olá, ' . $this->order->user->first_name)
                    ->line('Há uma atualizacão sobre sua solicitação "*'.$this->order->title.'*" 🚀. Por favor, clique no botão abaixo para interagir:')
                    ->action('Ver movimentação', route('order.show', $this->order))
                    ->line('Não deixe para comentar depois 😉! Sua interação garante que possamos finalizar sua solicitação o mais rápido possível.')
                    ->line("Até mais,")
                    ->salutation("Equipe Practice ❤️");
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
