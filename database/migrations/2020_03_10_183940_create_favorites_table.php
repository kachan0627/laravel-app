<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFavoritesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favorites', function (Blueprint $table) {
            //テーブルにカラムを追加
            $table->increments('id');
            $table->unsignedInteger('user_id')->comment('ユーザID');
            $table->unsignedInteger('tweet_id')->comment('ツイートID');
            $table->timestamps();
            //カラムにインデックスを追加
            $table->index('id');
            $table->index('user_id');
            $table->index('tweet_id');
            //組み合わせが一意であることを定義
            $table->unique([
              'user_id','tweet_id'
            ]);
            //外部キー定義
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tweet_id')->references('id')->on('tweets')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('favorites');
    }
}
