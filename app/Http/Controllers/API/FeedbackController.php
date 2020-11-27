<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Item;

use App\Http\Resources\FeedbackResource;

class FeedbackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::where('type', Item::TYPE_FEEDBACK)
            -> whereNull('parent_id')
            -> where('hidden', false);
        
        return FeedbackResource::collection($items -> paginate());
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
            'title' => 'required',
            'description' => 'required',
            'hidden' => 'bool',
        ]);

        $data['type'] = Item::TYPE_FEEDBACK;
        $data['status'] = Item::STATUS_WAITING;

        $item = Item::create($data);

        return response(
            new FeedbackResource($item),
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
            new FeedbackResource(Item::find($id)),
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
            'user_id' => 'required',
            'location_id' => 'required',
            'category_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'hidden' => 'bool',
        ]);

        $data['type'] = Item::TYPE_FEEDBACK;
        $data['status'] = Item::STATUS_WAITING;

        $feedback = Item::find($id);

        try {
            $feedback->update($data);
            
            return response(
                new FeedbackResource($feedback),
                Response::HTTP_OK
            );
            
        } catch (\Throwable $th) {
            throw $th;
        }
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
