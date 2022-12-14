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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("sender_warehouse_id")->nullable();
            $table->foreign('sender_warehouse_id')->references('id')->on('warehouse');

            $table->unsignedBigInteger("receiver_warehouse_id");
            $table->foreign('receiver_warehouse_id')->references('id')->on('warehouse');

            $table->unsignedBigInteger("product_id");
            $table->foreign('product_id')->references('id')->on('products');
            
            $table->integer("Count");
            $table->boolean("Status");
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
        Schema::dropIfExists('transactions');
    }
};
