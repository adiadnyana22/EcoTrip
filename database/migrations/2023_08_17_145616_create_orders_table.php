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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wisata_id');
            $table->foreignId('user_id');
            $table->integer('qty');
            $table->date('date');
            $table->integer('total_ticket_price');
            $table->foreignId('voucher_id');
            $table->integer('coin');
            $table->integer('unique_code');
            $table->integer('grand_total_price');
            $table->integer('status_code');
            //$table->foreignId('bank_id');
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
        Schema::dropIfExists('orders');
    }
};