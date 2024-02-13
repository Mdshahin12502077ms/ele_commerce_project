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
        Schema::create('customer__replies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Customer_name')->nullable();
            $table->string('Product_Name')->nullable();
            $table->string('Product_Id')->nullable();

            $table->string('comment_id')->nullable();
            $table->string('reply')->nullable();
            $table->string('user_id')->nullable();
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
        Schema::dropIfExists('customer__replies');
    }
};
