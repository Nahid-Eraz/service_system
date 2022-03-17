<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_order', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('division_id');
            $table->unsignedInteger('district_id');
            $table->unsignedInteger('upazila_id');


            $table->string('order_title')->nullable();
            $table->mediumText('order_description')->nullable();
            $table->mediumText('address')->nullable();
            $table->string('expiration_date')->nullable();
            $table->string('worker_amount')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('move_to_trash')->default(1);
            $table->string('slug')->nullable();


            // $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('division_id')->references('id')->on('divisions')->onDelete('cascade');
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
            $table->foreign('upazila_id')->references('id')->on('upazilas')->onDelete('cascade');

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
        Schema::dropIfExists('work_order');
    }
}
