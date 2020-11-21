<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('user_id');
            $table->string('name', 255)->collation('utf8mb4_unicode_ci');
            $table->string('birthday', 255)->collation('utf8mb4_unicode_ci');
            $table->string('phone', 255); //số điện thoại
            $table->string('CMND',255); // căn cước công dân
            $table->string('email')->nullable(); // email, tên đăng nhập
            $table->string('password',255)->default(null); // mật khẩu
            $table->string('image',255)->collation('utf8mb4_unicode_ci')->nullable(); // anh
            $table->integer('role_id')->default(1); // phân quyền user
            $table->integer('is_active')->default(0); // phê duyệt phòng cho thuê
            $table->string('address', 255)->collation('utf8mb4_unicode_ci')->nullable();// địa chỉ
            $table->integer('approval_id')->default(null); // id phê duyệt
            $table->date('date_approval')->default(null); // ngày phê duyệt
//            $table->date('date_register')->default(null);// ngày đăng bài
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
