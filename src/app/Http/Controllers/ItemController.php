<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Item;
use Carbon\Carbon;

class ItemController extends Controller
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
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        $project = Item::create([
            'title' => '',
            'abstract' => '',
            'period' => 0,
            'type' => Item::TYPE_PLAN,
            'status' => Item::STATUS_WAITING_SUPERVISION,
        ]);

        /*
        $participation = Participation::create([
            'user_id' => Auth::user()->id,
            'project_id' => $project->id,
            'role' => Participation::AUTHOR,
            'confirmed' => true,
            'confirmed_on' => Carbon::now()
        ]);*/

        return $this->edit($project);
    }

    /**
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show(Item $project)
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
    public function edit(Item $project)
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

        $project = new Item([
            'title' => $request->get('title'),
            'abstract' => $request->get('abstract', ''),
            'period' => $request->get('period'),
            'type' => $request->get('type'),
            'status' => $request->get('status')
        ]);

        $project->save();
        return redirect('/home')->with('success', 'Item saved!');
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

        $project = Item::find($id);
        $project->title =  $request->get('title');
        $project->abstract =  $request->get('abstract', '');
        $project->period =  $request->get('period');
        $project->type =  $request->get('type');
        $project->status =  $request->get('status');

        $project->save();

        return redirect('/home')->with('success', 'Item updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Item::find($id);
        $project->delete();

        return redirect('/home')->with('success', 'Item deleted!');
    }
}
