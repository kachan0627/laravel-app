<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFollowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('follows', function (Blueprint $table) {
            //テーブルにカラムを追加
            $table->unsignedInteger('user_id')->comment('フォローしているユーザID');
            $table->unsignedInteger('follow_id')->comment('フォローされているユーザID');
            $table->timestamps();
            //カラムにインデックスを追加
            $table->index('user_id');
            $table->index('follow_id');
            //組み合わせが一意であることを定義
            $table->unique([
              'user_id',
              'follow_id'
            ]);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('follows');
    }
}
