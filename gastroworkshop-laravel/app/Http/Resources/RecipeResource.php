<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RecipeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $method = explode(';', $this->method);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'method' => $method,
            'category' => $this->category,
            'publisher' => $this->publisher,
            'image' => $this->image
        ];
    }
}
