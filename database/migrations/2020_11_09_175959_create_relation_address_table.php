<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRelationAddressTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('relation_address', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('name',200)->collation('utf8mb4_unicode_ci')->nullable();
            $table->integer('parent_id')->default(0);
            $table->integer('create_by')->default(null);
            $table->integer('update_by')->default(null);
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('relation_address');
    }
}
