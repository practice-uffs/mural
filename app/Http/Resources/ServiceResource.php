<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use App\Specification;

class ServiceResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $specification = json_decode(
            Specification::find($this->specification_id)
                ->content
        );

        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'location_id' => $this->location_id,
            'category_id' => $this->category_id,
            'specification' =>$specification,
            'status' => $this->status,
            'type' => $this->type,
            'title' => $this->title,
            'description' => $this->description,
            'hidden' => $this->hidden,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
