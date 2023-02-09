<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    public function ingredientMeasure(){
        return $this->belongsTo(IngredientMeasure::class, 'ingredient_id', 'id');
    }
}
