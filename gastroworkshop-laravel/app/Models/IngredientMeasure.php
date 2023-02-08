<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IngredientMeasure extends Model
{
    public function recipe(){
        return $this->belongsTo(Recipe::class);
    }

    public function ingredient(){
        return $this->hasOne(Ingredient::class, 'ingredient_id', 'id');
    }

    public function measure(){
        return $this->hasOne(Measure::class, 'measure_id', 'id');
    }
}
