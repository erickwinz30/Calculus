<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListFoodTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('list_food', function (Blueprint $table) {
            $table->string('id_list_food', 10)->primary();
            $table->string('food_name');
            $table->decimal('food_calories', 10, 2);
            $table->decimal('cholesterol', 10, 2);
            $table->decimal('fat', 10, 2);
            $table->decimal('protein', 10, 2);
            $table->decimal('carbohydrate', 10, 2);
            $table->decimal('sodium', 10, 2);
            $table->decimal('sugar', 10, 2);
            $table->decimal('weight', 10, 2);
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
        Schema::dropIfExists('list_food');
    }
}
