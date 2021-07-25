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
        $request['user_id'] = auth()->id();

        $data = $request->validate([
            'user_id' => 'required|unique:channels,user_id',
            'fcm_token' => 'required',
        ]);

        $channels = Channels::create($data);

        return response(
            $channels,
            Response::HTTP_CREATED
        );
    }

    public function update(Request $request){
        $data = $request->validate([
            'fcm_token' => 'required',
        ]);
        $id = auth()->id();

        $channels = Channels::where('user_id', $id)->update($data);

        return response(
            $channels,
            Response::HTTP_OK
        );
    }

    public function destroy(){
        $user_id = auth()->id();
        Channels::where('user_id', $user_id)->delete();

        return response(
            null,
            Response::HTTP_NO_CONTENT
        );
    }
}
