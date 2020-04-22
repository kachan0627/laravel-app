<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Models\User;

class ListTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
     //投稿表示画面が表示されているかのテスト
     //loginページへ遷移
     //email:test3@test.com,password:12345678を入力
     //loginボタンをクリック
     //homeページ（投稿一覧ページ）へ遷移
     //getdata!が見つかるまでWaitForする
     //assertSeeを用いてtext:かか　が表示されているか確認
    public function testListDisplayed()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('email','test3@test.com')
                    ->type('password','12345678')
                    ->press('Login')
                    ->waitForText('get data!')
                    ->assertSee('かか');
                    //->assertVue('tweets.Array[29].text','かか','./components/List.vue');

        });
    }

    //投稿されていないtextが表示されていないかテスト
    //homeページ（投稿一覧ページ）へ遷移
    //getdata!が見つかるまでWaitForする
    //assertDontSeeを用いてtext:kdknjjgknjfjngjnfgh が表示されていないか確認
    public function testListNotDisplayed()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/home')
                    ->waitForText('get data!')
                    ->assertDontSee('kdknjjgknjfjngjnfgh');
                    //->assertVue('tweets.Array[29].text','かか','./components/List.vue');

        });
    }

    //投稿順に並んでいるかテスト
    //<div class="container">内の<ul><li>表示されている物を取得するために、
    //.container > ul li:を記述
    //v-forで回しているので、nth-child(x)x番目を指定
    //nth-child(1)で１番目に'kdkdkdk kdkdfgg'が表示されてるか確認
    //nth-child(2)で２番目に'やあ！投稿できてるのかな？'が表示されているか確認

    public function testCorrectOrder()
    {
      $this->browse(function (Browser $browser){
        $browser->visit('/home')
                ->waitForText('get data!')
                ->assertSeeIn('.container > ul li:nth-child(1)','kdkdkdk kdkdfgg')
                ->assertSeeIn('.container > ul li:nth-child(2)','やあ！投稿できてるのかな？');
      });
    }
    //投稿順に並んでいないかテスト
    //<div class="container">内の<ul><li>表示されている物を取得するために、
    //.container > ul li:を記述
    //v-forで回しているので、nth-child(x)x番目を指定
    //nth-child(2)で１番目に'kdkdkdk kdkdfgg'が表示されてるか確認
    //nth-child(1)で２番目に'やあ！投稿できてるのかな？'が表示されているか確認

    public function testDontCorrectOrder()
    {
      $this->browse(function (Browser $browser){
        $browser->visit('/home')
                ->waitForText('get data!')
                ->assertDontSeeIn('.container > ul li:nth-child(2)','kdkdkdk kdkdfgg')
                ->assertDontSeeIn('.container > ul li:nth-child(1)','やあ！投稿できてるのかな？');
      });
    }

}
