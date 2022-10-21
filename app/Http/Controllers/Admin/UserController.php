<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\UsersExport;

class UserController extends Controller
{
    /**
     * Show the list of all registered users.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.user');
    }

    public function download(){

        // return Excel::download($emails->toJson(), 'emails.xlsx');
        return Excel::download(new UsersExport, 'emails.xlsx');
    }
}
