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
        Schema::create('ingredient_measures', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->foreignId('ingredient_id')->constrained('ingredients');
            $table->foreignId('measure_id')->constrained('measures');
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
        Schema::dropIfExists('ingredient_measures');
    }
};
