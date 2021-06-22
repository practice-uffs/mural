<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use stdClass;


class Email extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user,$email,$item)
    {
        $this->user = $user;
        $this->email = $email;
        $this->item = $item;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        Mail::send($this->email->content,['user'=>$this->user,'item'=>$this->item],function($msg) {
            $msg->from(env('MAIL_FROM_ADDRESS',''), env('MAIL_FROM_NAME',''));
            $msg->to($this->user->email, $this->user->email);
            $msg->subject($this->email->subject);
        });
        if(Mail::failures()){
            return new Error(Mail::failures()); 
        }
    }
}
