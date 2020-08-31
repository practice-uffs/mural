<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Item;
use App\Location;
use App\Category;
use Carbon\Carbon;

use App\Http\Resources\CommentResource;

class ItemController extends Controller
{
    const RESPONSE_MESSAGES = [
        '1' => 'Feedback criado com sucesso!',
        '2' => 'Serviço criado com sucesso!'
    ];

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
     * Returns all feedbacks that may be seen.
     */
    protected static function getGlobalFeedbacks()
    {
        $items = Item::where('hidden', false)
            -> whereNull('parent_id')
            -> where('type', Item::TYPE_FEEDBACK)
            -> get();

        return $items;
    }

    /**
     * Returns all services that may be retrieved for the given user.
     */
    protected static function getGlobalServices()
    {
        $items = Item::whereNull('parent_id')
            -> where('type', Item::TYPE_SERVICE)
            -> get();

        return $items;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = Auth::user();

        return view('item.index', [
            'user' => $user,
            'feedbacks' => SELF::getGlobalFeedbacks(),
            'services' => SELF::getGlobalServices(),
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
            'type' => 'required',
            'title' => 'required',
            'hidden' => 'required',
            'location_id' => 'required',
            'category_id' => 'required',
            'description' => 'required',
        ]);

        $item_type = $request->type;
        // TODO: checar location e category

        $item = new Item([
            'user_id' => Auth::user()->id,
            'location_id' => $request->location_id,
            'category_id' => $request->category_id,
            'status' => Item::STATUS_ACTIVE,
            'type' => $item_type,
            'title' => $request->title,
            'description' => $request->description,
            'hidden' => SELF::isItemVisible($item_type, $request -> hidden)
        ]);

        $item->save();

        return response(
            ['message' => SELF::RESPONSE_MESSAGES[$item_type]],
            Response::HTTP_CREATED
        );
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
