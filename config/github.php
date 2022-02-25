<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Webhook secret
    |--------------------------------------------------------------------------
    |
    | Secret informado no painel de webhook do Github.
    |
    */
    'webhook_secret' => env('GITHUB_WEBHOOK_SECRET', ''),
    
    /*
    |--------------------------------------------------------------------------
    | username
    |--------------------------------------------------------------------------
    |
    | Nome de usuário que fará as interações como um bot, ex.: 'dovyski'
    |
    */

    'username' => env('GITHUB_USERNAME', 'PracticeUFFSBot'),

    /*
    |--------------------------------------------------------------------------
    | Token
    |--------------------------------------------------------------------------
    |
    | token de acesso do usuário informado acima.
    |
    */
    'token' => env('GITHUB_TOKEN', ''),

    /*
    |--------------------------------------------------------------------------
    | Menção de cliente
    |--------------------------------------------------------------------------
    |
    | Qual string será utilizada para verificar se alguém comentou algo numa
    | issue do github que gostaria que viesse para o mural.
    |
    */
    'issue_client_mention' => '@cliente',

    /*
    |--------------------------------------------------------------------------
    | Uid usuário comentador do github
    |--------------------------------------------------------------------------
    |
    | Qual é o uid do usuário local (do mural) que será usado para postar
    | informações de comentários que chegam do github.
    |
    */
    'user_uid_comments' => env('GITHUB_USER_UID_COMMENTS', 'practice'),
];
