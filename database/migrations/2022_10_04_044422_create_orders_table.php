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
            $table->bigIncrements('or_id');
            $table->date('or_date');

            //forgein key product id
            $table->unsignedBigInteger('p_id');
            $table->foreign('p_id')->references('p_id')->on('products');
            
            //forgein key user id
            $table->unsignedBigInteger('id');
            $table->foreign('id')->references('id')->on('users');
            $table->integer('or_qty');
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
