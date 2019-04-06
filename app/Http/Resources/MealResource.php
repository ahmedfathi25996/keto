<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\IngredientResource;

class MealResource extends JsonResource
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
        'meal_id' => $this->id,
        'name' => $this->name,
        'meal_type' => $this->meal_type,
        'calories	' => $this->calories,
        'preparation' => $this->preparation,
        'ingredients' =>IngredientResource::collection($this->ingredients) 
      ];
    }
}
