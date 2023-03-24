<?php

namespace App\Exports;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // ini_set('memory_limit', '4056M');
        if(auth::check()){
            return User::where('type', 'normal')->get(['email']);
        }
    }
}