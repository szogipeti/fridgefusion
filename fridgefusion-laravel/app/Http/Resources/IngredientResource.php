<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class IngredientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $validMeasures = [];
        foreach ($this->validmeasures as $measure){
            $validMeasures[] = $measure['id'];
        }
        return [
            'id' => $this->id,
            'name' => $this->name,
            'category' => $this->category,
            'validMeasures' => $validMeasures
        ];
    }
}
