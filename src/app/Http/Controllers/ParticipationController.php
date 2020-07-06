<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Project;
use App\Participation;
use App\User;
use Carbon\Carbon;

class ParticipationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Participation $participation)
    {
        $request->validate([
            'title' => 'required',
            'period' => 'required',
            'type' => 'required',
            'status' => 'required'
        ]);

        $participation->abstract =  $request->get('abstract', '');
        $participation->save();

        return [
            'success' => true
        ];
    }

    /**
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'project_id' => 'required',
            'role' => 'required'
        ]);

        $username = $request->get('username');
        $project_id = $request->get('project_id');
        
        // TODO: check project permissions
        // TODO: check roles are valid
        $user = User::where('username', $username)->first();
        $project = Project::where('id', $project_id)->first();
        $role = $request->get('role');
        $confirmed = false;

        $participation = new Participation([
            'user_id' => $user->id,
            'project_id' => $project->id,
            'role' => $role,
            'confirmed' => $confirmed,
            'confirmed_on' => Carbon::now()
        ]);

        $participation->save();

        return [
            'participation' => $participation
        ];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function remove(Participation $participation)
    {
        $participation->delete();

        return [
            'success' => true
        ];
    }
}
