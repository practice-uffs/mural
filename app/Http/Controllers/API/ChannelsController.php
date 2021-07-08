<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Channels;
use Illuminate\Broadcasting\Channel;
use App\Http\Resources\ServiceResource;
use SebastianBergmann\Environment\Console;

class ChannelsController extends Controller
{
    public function store(Request $request){

        $data = [
            'user_id' => $request->user_id,
            'fcm_token' => $request->fcm_token,
        ];

        $channels = Channels::create($data);

        return response(
            new ServiceResource($channels),
            Response::HTTP_CREATED
        );
    }
}
