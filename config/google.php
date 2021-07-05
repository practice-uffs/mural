<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Google Drive
    |--------------------------------------------------------------------------
    |
    | Informações relacionadas aos serviços do Google Drive.
    |
    |  tasks_folder_id:
    |      id da pasta "Tarefas" usada pela equipe no Google Drive.
    |
    */
    'drive' => [
        'tasks_folder_id' => env('GOOGLE_DRIVE_TASKS_FOLDER_ID', '1aBjyA92_IdiPJokAJyBF9HtIKzMIVqvQ'),
    ],    
];
