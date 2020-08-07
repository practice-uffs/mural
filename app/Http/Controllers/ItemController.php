<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Item;
use App\Location;
use App\Category;
use Carbon\Carbon;

use App\Http\Resources\CommentResource;


class ItemController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Returns the categories for a given type of item
     * @param int
     * @return
     */
    protected static function findCategoriesByItemType($itemType)
    {
        return Category::where('item_type', $itemType) -> get();
    }

    /**
     * Returns all items that may be retrieved for the given user.
     * @return [type] [description]
     * @param  [type] $user [description]
     */
    protected static function getGlobalItems($user)
    {
        $items = Item::where('hidden', false)
            -> whereNull('parent_id')
            -> get();

        return $items;
    }

    protected static function isItemVisible($itemType, $hidden)
    {
        return !$hidden == 'on' || $itemType == Item::TYPE_SERVICE;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();

        return view('item.index', [
            'user' => $user,
            'items' => SELF::getGlobalItems($user)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($type)
    {
        $formTitle = ($type == 1) ?
            'Adicionar uma ideia' :
            'Solicitar um serviço';

        return view('item.create', [
            'user' => Auth::user(),
            'type' => $type,
            'formTitle' => $formTitle,
            'categories' => SELF::findCategoriesByItemType($type),
            'locations' => Location::all()
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
        ]);

        // TODO: checar location e category

        $item = new Item([
            'user_id' => Auth::user()->id,
            'location_id' => $request->get('location_id'),
            'category_id' => $request->get('category_id'),
            'status' => Item::STATUS_ACTIVE,
            'type' => $request -> type,
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'hidden' => SELF::isItemVisible($request -> type, $request -> hidden)
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
    public function show($id)
    {
        $item = Item::find($id);

        return view('item.show', [
            'user' => Auth::user(),
            'item' => $item,
            'reactions' => $item -> reactions -> groupBy('text')
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        return view('item.edit', [
            'user' => Auth::user(),
            'item' => $item,
            'categories' => $this->findCategoriesByItemType($item -> type),
            'locations' => Location::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'location_id' => 'required',
            'category_id' => 'required',
            'title' => 'required',
            'description' => 'required',
        ]);

        // TODO: checar location e category

        $item->user_id = Auth::user()->id;
        $item->location_id = $request->get('location_id');
        $item->category_id = $request->get('category_id');
        $item->status = Item::STATUS_ACTIVE;
        $item->type = $request -> type;
        $item->title = $request->get('title');
        $item->description = $request->get('description');
        $item->hidden = SELF::isItemVisible($request -> type, $request -> hidden);
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
