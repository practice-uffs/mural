<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Participation;
use App\Project;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $projects = $this->findProjects();

        return view('user.home', [
            'user' => Auth::user(),
            'projects' => $projects,
            'showCreateProject' => count($projects) == 0 || $this->canCreateProjects() 
        ]);
    }

    private function canCreateProjects()
    {
        // TODO: work on this
        return false;
    }

    private function findProjects()
    {
        $participations = Participation::where('user_id', Auth::user()->id)
                    ->orderBy('created_at', 'desc')
                    ->get();

        $project_ids = [];

        foreach($participations as $participation) {
            $project_ids[] = $participation->project_id;
        }

        $projects = Project::whereIn('id', $project_ids)->get();
        return $projects;
    }
}
