<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    public function ingredientMeasures(){
        return $this->belongsToMany(IngredientMeasure::class);
    }
}
