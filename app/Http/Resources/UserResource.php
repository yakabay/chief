<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        JsonResource::withoutWrapping();

        return [
            'id' => $this->id,
            'text' => "$this->name, $this->position",
            'children' => UserResource::collection($this->children),
        ];
    }
}
