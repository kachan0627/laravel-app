<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTweetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tweets', function (Blueprint $table) {
            //テーブルにカラムを追加
            $table->increments('id');
            $table->unsignedInteger('user_id')->comment('ユーザID');
            $table->string('text')->comment('本文');
            $table->unsignedInteger('reply_tweet_id')->nullable()->comment('返信先のユーザID');
            $table->softDeletes();
            $table->timestamps();
            //カラムにインデックスを追加
            $table->index('id');
            $table->index('user_id');
            $table->index('text');
            $table->index('reply_tweet_id');
            //外部キー宣言
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('reply_tweet_id')->references('id')->on('tweets')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tweets');
    }
}
