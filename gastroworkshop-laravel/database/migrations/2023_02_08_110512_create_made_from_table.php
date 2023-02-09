<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('made_from', function (Blueprint $table) {
            $table->foreignId('recipe_id')->constrained('recipes');
            $table->foreignId('ingredientMeasure_id')->constrained('ingredient_measures');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('made_from');
    }
};
