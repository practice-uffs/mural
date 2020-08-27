<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Item;
use App\Specification;

use App\Http\Resources\ServiceResource;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Item::where('type', Item::TYPE_SERVICE)
            -> whereNull('parent_id');
        
        return ServiceResource::collection($items -> paginate());
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
            'description' => 'required'
        ]);
        
        $data['hidden'] = true;
        $data['type'] = Item::TYPE_SERVICE;
        $data['status'] = Item::STATUS_ACTIVE;

        $specification = Specification::create([
            'content' => json_encode($request -> specification)
        ]);

        $data['specification_id'] = $specification -> id;

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
            'user_id' => 'required',
            'location_id' => 'required',
            'category_id' => 'required',
            'title' => 'required',
            'description' => 'required'
        ]);

        $data['hidden'] = true;
        $data['type'] = Item::TYPE_SERVICE;
        $data['status'] = Item::STATUS_ACTIVE;

        $service = Item::find($id);
        $specification = Specification::find($service->specification_id);

        try {
            $specification->update([
                'content' => json_encode($request -> specification)
            ]);
            
            $service->update($data);

            return response(
                new ServiceResource($service),
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
