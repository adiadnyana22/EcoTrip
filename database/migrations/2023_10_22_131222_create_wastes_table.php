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
        Schema::create('wastes', function (Blueprint $table) {
            $table->id();
            $table->string('order_type'); // W for Wisata or E for Explore
            $table->foreignId('order_id');
            $table->foreignId('user_id');
            $table->integer('product_id');
            $table->integer('status_code'); // 1 for not confirm yet AND 2 for confirm by admin
            $table->integer('star');
            $table->string('review', 500);
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
        Schema::dropIfExists('wastes');
    }
};
