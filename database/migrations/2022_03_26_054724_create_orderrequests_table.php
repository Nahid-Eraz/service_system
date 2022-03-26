<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderrequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orderrequests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id');
            $table->unsignedInteger('work_order_id');

            $table->integer('amount')->nullable();
            $table->string('slug')->nullable();
            $table->enum('status',['Accept','Cancel','Pending'])->nullable();

            $table->foreign('work_order_id')->references('id')->on('work_order')->onDelete('cascade');
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
        Schema::dropIfExists('orderrequests');
    }
}
