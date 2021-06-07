<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use App\User;
use App\Location;
use App\Category;
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
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'user' => User::find($this->user_id)->username,
            'location_id' => Location::find($this->location_id)->name,
            'category_id' => Category::find($this->category_id)->name,
            'specification_id' => Specification::find($this->specification_id)->title,
            'status' => $this->status,
            'title' => $this->title,
            'description' => $this->description,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'github_issue_link' => $this->github_issue_link,
            'delivery_date' => $this->delivery_date,
        ];
    }
}
