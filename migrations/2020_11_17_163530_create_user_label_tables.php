<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserLabelTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('labels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 55)->unique()->comment('标签名称');
        });

        Schema::create('label_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('label_id')->index()->comment('标签ID');
            $table->unsignedBigInteger('user_id')->index()->comment('会员ID');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('labels');
        Schema::dropIfExists('label_user');
    }
}
