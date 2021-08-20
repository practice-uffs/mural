<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UserWelcome extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
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
                    ->subject('Boas-vindas ao Practice Mural!')
                    ->greeting('Olá, ' . $notifiable->first_name)
                    ->line('Estamos muito felizes em ter você conosco! 🥳 O [Practice Mural]('.route('index').') é a forma oficial de interagir com o [Practice](https://practice.uffs.edu.br). Tudo que temos a oferecer está listado nele.')
                    ->line('Para acessar o [Practice Mural]('.route('index').'), visite ['. route('index').']('.route('index').') ou clique no botão abaixo:')
                    ->action('Acessar Practice Mural', route('index'))
                    ->line('Algumas dicas para você aproveitar ao máximo o que temos a oferecer:')
                    ->line('- Quer comentar algo (nossas perguntas, suas observações, etc)? _Sempre_ use o [Practice Mural]('.route('index').'), não o e-mail.')
                    ->line('- Se fizer uma solicitação, fique atento a movimentações (avisamos por e-mail inclusive).')
                    ->line('- Recebemos muitas solicitações, então sua agilidade na resposta é importante.')
                    ->line("Além disso, confira tudo que o Practice Mural tem a oferecer:")
                    ->line('- [Serviços disponíveis]('.route('services').'): podemos ajudar com muita coisa, basta solicitar! 🤗')
                    ->line('- [Ideias]('.route('ideas').'): tem alguma ideia para melhorar a universidade? Queremos saber para trabalhar nela um dia! 🚀')
                    ->line('- [Feedbacks]('.route('feedbacks').'): a qualquer momento, faça críticas, comentários, sugestões ou elogios. Sua opinião é muito importante 😉')
                    ->line("Todos os serviços do Practice estão disponíveis a toda a comunidade acadêmica da UFFS. Tudo isso grátis, fácil e rápido.")
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
