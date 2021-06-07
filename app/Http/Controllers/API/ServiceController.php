<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

use App\Item;
use App\User;
use App\Specification;

use App\Http\Resources\ServiceResource;

class ServiceController extends Controller
{
    protected function getServicesForNormalUser($userId) {
        return Item::where('type', Item::TYPE_SERVICE)
            -> whereNull('parent_id')
            -> where('user_id', $userId);
    }

    protected function getServicesForAdminUser() {
        return Item::where('type', Item::TYPE_SERVICE)
            -> whereNull('parent_id');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $user = User::find($request -> user_id);

        if ($user -> isAdmin()) {
            $items = SELF::getServicesForAdminUser();

        } else {
            $items = SELF::getServicesForNormalUser($user -> id);
        }

        return ServiceResource::collection($items -> paginate(10000));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required',
            'location_id' => 'required',
            'category_id' => 'required',
            'specification_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'delivery_date' => 'nullable'
        ]);

        $data['hidden'] = false;
        $data['type'] = Item::TYPE_SERVICE;
        $data['status'] = Item::STATUS_WAITING;

        $item = Item::create($data);

        return response(
            new ServiceResource($item),
            Response::HTTP_CREATED
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return response(
            new ServiceResource(Item::find($id)),
            Response::HTTP_OK
        );
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
        $data = $request->validate([
            'location_id' => 'required',
            'category_id' => 'required',
            'title' => 'required',
            'specification_id' => 'required',
            'description' => 'required',
            'delivery_date' => 'nullable'
        ]);

        $item = Item::find($id);

        $item->location_id = $request->get('location_id');
        $item->category_id = $request->get('category_id');
        $item->specification_id = $request->get('specification_id');
        $item->status = $request->get('status');
        $item->title = $request->get('title');
        $item->description = $request->get('description');
        $item->github_issue_link = $request->get('github_issue_link');
        $item->delivery_date = $request->get('delivery_date');

        $item->save();
        $item->touch();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
