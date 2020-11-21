<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_report', function (Blueprint $table) {
            $table->Increments('report_id');
            $table->integer('receive_id')->default(0);
            $table->string('title', 200)->collation('utf8mb4_unicode_ci')->nullable();//tiêu đề
            $table->string('content', 200)->collation('utf8mb4_unicode_ci')->nullable();//nội dung
            $table->integer('is_active')->default(0);
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
        Schema::dropIfExists('user_report');
    }
}
