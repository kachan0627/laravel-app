<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class FormTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Laravel')
                    ->visit('/login')
                    ->type('email','test3@test.com')
                    ->type('password','12345678')
                    ->press('Login');
        });
    }
    //投稿できるかのテスト
  /*  public function testFormDisplayed()
     {
         $this->browse(function (Browser $browser) {
             $browser->visit('/create')
                     ->waitForText('get user data!')
                     ->type('tweet','こんにちは')
                     ->press('create')
                     ->waitForText('保存しました')
                     ->assertSee('保存しました');
                     //->assertVue('tweets.Array[29].text','かか','./components/List.vue');

         });
     }
     //投稿できるかのテスト(DB)
     public function testFormCheck()
     {
         $this->browse(function (Browser $browser) {
             $browser->visit('/create')
                     ->waitForText('get user data!')
                     ->type('tweet','やあ！投稿できてる？')
                     ->press('create')
                     ->waitForText('保存しました')
                     ->assertSee('保存しました');

         });
         $this->assertDatabaseHas('tweets',['text'=>'やあ！投稿できてる？']);
     }
     //投稿できるかのテスト(browser)
     public function testFormCheck()
     {
         $this->browse(function (Browser $browser) {
             $browser->visit('/create')
                     ->waitForText('get user data!')
                     ->type('tweet','やあ！投稿できてるのかな？')
                     ->press('create')
                     ->waitForText('保存しました')
                     ->assertSee('保存しました')
                     ->visit('/home')
                     ->waitForText('get data!')
                     ->assertSee('やあ！投稿できてるのかな？');



         });
     }*/
     //投稿していないテキストが確認できないかテスト
     public function testFormMissCheck()
     {
         $this->assertDatabaseMissing('tweets',['text'=>'やあ！投稿できてる？？']);
     }
}
