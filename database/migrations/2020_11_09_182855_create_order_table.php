<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->Increments('order_id');
            $table->integer('room_id')->default(0); // id phòng
            $table->integer('user_id')->default(0);//user id
            $table->integer('facilities_id')->default(0);//tien ich id
            $table->integer('status')->default(0);//trạng thái
            $table->float('price')->default(0);
            $table->string('order_date')->default(null);// ngày update
            $table->integer('approved_id')->default(0);//approved id
            $table->dateTime('approved_date')->default(null);//ngày duyệt
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
        Schema::dropIfExists('order');
    }
}
