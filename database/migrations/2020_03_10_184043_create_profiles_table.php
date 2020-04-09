<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            //テーブルにカラムを追加
            $table->increments('id');
            $table->unsignedInteger('user_id')->unique()->comment('ユーザID');
            $table->string('introduction')->nullable()->comment('自己紹介');
            $table->string('place')->nullable()->comment('場所');
            $table->date('birthday')->nullable()->comment('誕生日');
            $table->timestamps();
            //外部キー定義
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
