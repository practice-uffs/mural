<?php

namespace App\Notifications;

use App\Model\Order;
use App\Model\OrderEvaluation;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class OrderCompleted extends Notification implements ShouldQueue
{
    use Queueable;

    protected Order $order;
    protected OrderEvaluation $evaluation;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Order $order, OrderEvaluation $evaluation)
    {
        $this->order = $order->withoutRelations();
        $this->evaluation = $evaluation;
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
                    ->subject('Avalie nosso trabalho em sua solicitação (Practice Mural #' . $this->order->id . ')')
                    ->greeting('Olá, ' . $this->order->user->first_name)
                    ->line('Por favor, avalie o resultado da sua solicitação "*'.$this->order->title.'*" clicando no botão abaixo:')
                    ->action('Avaliar resultado', route('orderevaluation.show', [
                        'orderEvaluation' => $this->evaluation,
                        'hash' => $this->evaluation->hash
                    ]))
                    ->line('É bem rapidinho, nem 2 minutos (você pode fazer em 1 minuto se você estiver com pressa 😁)!')
                    ->line('Sua avaliação é muito importante! Ela ajuda a melhorar nossos serviços.')
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
