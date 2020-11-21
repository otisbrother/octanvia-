<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room', function (Blueprint $table) {
            $table->Increments('room_id');
            $table->integer('roomType_id')->default(0);//mã loại phòng
            $table->string('title', 200)->collation('utf8mb4_unicode_ci')->nullable();//tiêu đề
            $table->string('description', 200)->collation('utf8mb4_unicode_ci')->nullable();//tiêu đề
            $table->text('address')->collation('utf8mb4_unicode_ci')->nullable();// địa chỉ cụ thể
            $table->integer('district_id')->default(0);// huyện
            $table->integer('city_id')->default(0);// tỉnh/thành phố
            $table->string('room_type', 255)->collation('utf8mb4_unicode_ci');//kiểu phòng trọ
            $table->integer('quantity')->default(0);// số lượng
            $table->float('price')->default(0); // giá
            $table->string('image',255)->collation('utf8mb4_unicode_ci')->nullable();//ảnh room
            $table->double('area')->default(0); //diện tích
            $table->text('note')->default(null);// chú thích gần khu vực nào
            $table->integer('live_with_owner')->default(0); //chung chủ hoặc không
            $table->date('public_date')->default(null);// ngày đăng
            $table->date('expired_date')->default(null);// ngày hết hạn
            $table->integer('electric_payment')->default(0); // thanh toán điện
            $table->float('electric_price')->default(0); // giá điện
            $table->integer('water_price')->default(0); // giá nước
            $table->date('date_approval')->default(null); // ngày phê duyệt
            $table->integer('approval_id')->default(1); // id phê duyệt
            $table->integer('user_id')->default(1); // id người đăng bài
            $table->integer('is_active')->default(0); // còn phòng hay không
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
        Schema::dropIfExists('room');
    }
}
