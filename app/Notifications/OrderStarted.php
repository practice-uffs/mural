<?php

namespace App\Notifications;

use App\Models\Comment;
use App\Models\Order;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Broadcasting\PushNotificationChannel;

class OrderStarted extends Notification implements ShouldQueue
{
    use Queueable;

    protected Order $order;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', PushNotificationChannel::class];
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
                    ->subject('Sua solicitação foi iniciada! (Practice Mural #' . $this->order->id . ')')
                    ->greeting('Olá, ' . $this->order->user->first_name)
                    ->line('A Equipe Practice começou a trabalhar na sua solicitação *"'.$this->order->title.'"* 🚀. Você pode acompanhá-la clicando no botão abaixo:')
                    ->action('Acessar solicitação', route('order.show', $this->order))
                    ->line('Se precisar comentar algo (nossas perguntas, suas observações, etc), _sempre_ use o [Practice Mural]('.config('app.url').'), não o e-mail.')
                    ->line('Avisaremos sobre o andamento do seu pedido.')
                    ->line("Até mais,")
                    ->salutation("Equipe Practice ❤️");
    }

    public function toPushNotification($notifiable)
    {
        return [
            'title' => "Sua solicitação foi iniciada! (Practice Mural #" . $this->order->id . ")",
            'body' => "A Equipe Practice começou a trabalhar na sua solicitação '".$this->order->title."'",
        ];
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
