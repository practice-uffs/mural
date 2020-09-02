<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use App\User;

class FeedbackResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'user' => User::find($this->user_id),
            'location_id' => $this->location_id,
            'category_id' => $this->category_id,
            'status' => $this->status,
            'title' => $this->title,
            'description' => $this->description,
            'hidden' =>$this->hidden,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
