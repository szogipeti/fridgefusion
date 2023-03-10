<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = ['name', 'method', 'category', 'publisher_id', 'image','total_time','serving'];

    public function ingredients(){
        return $this->belongsToMany(Ingredient::class, 'made_from')->withPivot('quantity', 'measure_id');
    }

    public function publisher(){
        return $this->hasOne(User::class);
    }
}
