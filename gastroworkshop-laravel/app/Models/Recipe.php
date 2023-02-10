<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = ['name', 'method', 'category', 'publisher', 'image'];

    public function ingredientMeasures(){
        return $this->belongsToMany(IngredientMeasure::class);
    }
}
