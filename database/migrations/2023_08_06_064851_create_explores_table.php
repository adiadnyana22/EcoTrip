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
        Schema::create('explores', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('picture');
            $table->integer('local_price');
            $table->integer('local_weekend_price');
            $table->integer('foreign_price');
            $table->integer('foreign_weekend_price');
            $table->string('location');
            $table->integer('type'); // 0 for private trip and 1 for open trip
            $table->string('description', 2000);
            $table->string('activity', 2000);
            $table->string('includes', 2000);
            $table->string('itinerary', 2000);
            $table->float('rating');
            $table->integer('order');
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
        Schema::dropIfExists('explores');
    }
};
