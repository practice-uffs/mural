<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Project;
use App\Participation;
use Carbon\Carbon;

class ProjectController extends Controller
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

    private function findParticitionsByRole(Project $project, $role)
    {
        $participations = $project->particpations->reject(function ($participation) use ($role) {
            return $participation->role === $role;
        });
        
        return $participations;
    }

    /**
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        // TODO: check if user already has a project
        $existingParticipation = Participation::where('user_id', Auth::user()->id)->first();

        if($existingParticipation) {
            // TODO: improve this
            dd($existingParticipation);
        }

        $project = Project::create([
            'title' => '',
            'abstract' => '',
            'period' => 0,
            'type' => Project::TYPE_PLAN,
            'status' => Project::STATUS_WAITING_SUPERVISION,
        ]);

        $participation = Participation::create([
            'user_id' => Auth::user()->id,
            'project_id' => $project->id,
            'role' => Participation::AUTHOR,
            'confirmed' => true,
            'confirmed_on' => Carbon::now()
        ]);

        return $this->edit($project);
    }

    /**
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show(Project $project)
    {
        return view('project.view', [
            'user' => Auth::user(),
            'project' => $project
        ]);
    }

    /**
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit(Project $project)
    {
        return view('project.edit', [
            'user' => Auth::user(),
            'project' => $project,
            'examining' => $this->findParticitionsByRole($project, Participation::EXAMINER)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'period' => 'required',
            'type' => 'required',
            'status' => 'required'
        ]);

        $project = new Project([
            'title' => $request->get('title'),
            'abstract' => $request->get('abstract', ''),
            'period' => $request->get('period'),
            'type' => $request->get('type'),
            'status' => $request->get('status')
        ]);

        $project->save();
        return redirect('/home')->with('success', 'Project saved!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'period' => 'required',
            'type' => 'required',
            'status' => 'required'
        ]);

        $project = Project::find($id);
        $project->title =  $request->get('title');
        $project->abstract =  $request->get('abstract', '');
        $project->period =  $request->get('period');
        $project->type =  $request->get('type');
        $project->status =  $request->get('status');

        $project->save();

        return redirect('/home')->with('success', 'Project updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function remove($id)
    {
        $project = Project::find($id);
        $project->delete();

        return redirect('/home')->with('success', 'Project deleted!');
    }
}
