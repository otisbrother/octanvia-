<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomImageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_image', function (Blueprint $table) {
            $table->Increments('room_image_id');
            $table->integer('room_id')->default(0); // id phòng
            $table->string('image',255)->collation('utf8mb4_unicode_ci')->nullable();//ảnh khác của room
            $table->integer('position')->default(0);//vị trí ảnh
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
        Schema::dropIfExists('room_image');
    }
}
