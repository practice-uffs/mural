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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    protected function findCategoriesByItemType(Item $item)
    {
        // Filtrar cateogira por tipo
        $categories = Category::all('name', 'id');
        return $categories;
    }

    /**
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create()
    {
        return view('item.create', [
            'user' => Auth::user()
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
            'location_id' => 'required',
            'category_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'hidden' => 'required'
        ]);

        // TODO: checar location e category

        $item = new Item([
            'user_id' => Auth::user()->id,
            'location_id' => $request->get('location_id'),
            'category_id' => $request->get('category_id'),
            'status' => Item::STATUS_ACTIVE,
            'type' => Item::TYPE_IDEA,
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'hidden' => $request->get('hidden', false),
        ]);

        $item->save();
        return redirect('/home')->with('success', 'Item saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show($item)
    {
        return view('item.view', [
            'user' => Auth::user(),
            'item' => $item
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit($item)
    {
        return view('item.edit', [
            'user' => Auth::user(),
            'item' => $item
        ]);
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
            'location_id' => 'required',
            'category_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'hidden' => 'required'
        ]);

        // TODO: checar location e category

        $item = Item::find($id);
        $item->user_id = Auth::user()->id;
        $item->location_id = $request->get('location_id');
        $item->category_id = $request->get('category_id');
        $item->status = Item::STATUS_ACTIVE;
        $item->type = Item::TYPE_IDEA;
        $item->title = $request->get('title');
        $item->description = $request->get('description');
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
