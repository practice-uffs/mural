<?php

namespace App\Broadcasting;

use App\Models\User;
use GuzzleHttp\Client; 
use Carbon\Carbon;
use Firebase\JWT\JWT;

class PushNotificationChannel
{
    /**
     * Create a new channel instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function send($notifiable, $notification)
    {
        $data = $notification->toPushNotification($notifiable);

        $key = env('APP_KEY');
        $payload = array(
            'iss' => env('APP_NAME'),
            'aud' => 'practice.uffs.edu.br',
            'iat' => Carbon::now()->timestamp,
            'nbf' => Carbon::now()->timestamp - 1,
            'app_id' => env('APP_ID'),
            'user' => $notifiable
        );
        $jwt = JWT::encode($payload, $key);

        $client = new Client();     
        $client->get('http://127.0.0.1:8000/v0/user/notify/push', [
            'headers' => [ 'Authorization' => 'Bearer ' . $jwt ],
            'json' => $data
        ]);
    }

    /**
     * Authenticate the user's access to the channel.
     *
     * @param  \App\Models\User  $user
     * @return array|bool
     */
    public function join(User $user)
    {
        //
    }
}
