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
        Schema::create('order_explores', function (Blueprint $table) {
            $table->id();
            $table->string('kode_tiket');
            $table->foreignId('explore_id');
            $table->foreignId('user_id');
            $table->foreignId('meeting_point_id');
            $table->integer('qty');
            $table->date('date');
            $table->integer('total_ticket_price');
            $table->foreignId('voucher_id');
            $table->integer('coin');
            $table->integer('unique_code');
            $table->integer('grand_total_price');
            $table->integer('status_code'); // 1 for start order AND 2 for confirm by admin
            $table->integer('waste_flag'); // 0 for no review AND 1 for review
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
        Schema::dropIfExists('order_explores');
    }
};
