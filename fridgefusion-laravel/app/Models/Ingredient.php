<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{

    public function recipes(){
        return $this->belongsToMany(Recipe::class, 'made_from');
    }

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function validMeasures(){
        return $this->belongsToMany(Measure::class, 'valid_measures');
    }
}
