<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Item;
use App\Location;
use App\Category;
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
        $item = Item::create([
            'user_id' => Auth::user()->id,
            'location_id' => 1,
            'category_id' => 1,
            'status' => Item::STATUS_ACTIVE,
            'type' => Item::TYPE_IDEA,
            'title' => '',
            'description' => '',
            'hidden' => false
        ]);

        return $this->edit($item);
    }

    /**
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show(Item $item)
    {
        return view('item.view', [
            'user' => Auth::user(),
            'item' => $item
        ]);
    }

    /**
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit(Item $item)
    {
        return view('item.edit', [
            'user' => Auth::user(),
            'item' => $item
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
            'status' => 'required',
            'type' => 'required',
            'title' => 'required',
            'description' => 'required',
            'hidden' => 'required'
        ]);

        $item = new Item([
            'title' => $request->get('title'),
            'abstract' => $request->get('abstract', ''),
            'period' => $request->get('period'),
            'type' => $request->get('type'),
            'status' => $request->get('status')
        ]);

        $item->save();
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
            'status' => 'required',
            'type' => 'required',
            'title' => 'required',
            'description' => 'required',
            'hidden' => 'required'
        ]);

        $item = Item::find($id);
        $item->status = $request->get('status');
        $item->type = $request->get('type');
        $item->title = $request->get('title');
        $item->description = $request->get('description', '');
        $item->hidden = $request->get('hidden');
        $item->updated_at = Carbon::now();
        
        $item->save();

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
        $item = Item::find($id);
        $item->delete();

        return redirect('/home')->with('success', 'Item deleted!');
    }
}
