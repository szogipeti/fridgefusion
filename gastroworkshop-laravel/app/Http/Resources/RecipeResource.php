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
        $ingredients = [];
        foreach ($this->ingredients as $ingredient){
            $ingredients[] = [
                'ingredient_id' => $ingredient->pivot->ingredient_id,
                'measure_id' => $ingredient->pivot->measure_id,
                'quantity' => $ingredient->pivot->quantity
            ];
        }

        return [
            'id' => $this->id,
            'name' => $this->name,
            'method' => $method,
            'category' => $this->category,
            'publisher' => $this->publisher,
            'image' => $this->image,
            'total_time' => $this->total_time,
            'serving' => $this->serving,
            'ingredients' => $ingredients
        ];
    }
}
