<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room_type', function (Blueprint $table) {
            $table->Increments('roomType_id');
            $table->string('name', 255)->collation('utf8mb4_unicode_ci')->nullable();//loại nhà trọ
            $table->integer('create_by')->default(0);// id của người tạo
            $table->integer('update_by')->default(0);// id của người update
            $table->integer('is_active')->default(1);//trạng thái
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
        Schema::dropIfExists('room_type');
    }
}
