<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Models\User;

class ProfileTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
     //プロフィール画面が表示されているかテスト
    public function testProfileDisplay(){
      $this->browse(function (Browser $browser){
        $browser->loginAs(User::find(2))
                ->visit('/profile')
                ->assertPathIs('/profile');
      });
    }
    //プロフィール画面以外が表示されていないかテスト
   public function testProfileNOTDisplay(){
     $this->browse(function (Browser $browser){
       $browser->loginAs(User::find(2))
               ->visit('/profile')
               ->assertPathIsNOT('/search');
     });
   }
     //プロフィール内容が表示されているかテスト
    //ログインしているユーザがTEST2
    //assertSeeでTEST2がプロフィール情報として表示できているか確認している。
    public function testProfileUserNameDisplay(){
      $this->browse(function (Browser $browser){
        $browser->loginAs(User::find(2))
                ->visit('/profile')
                ->waitForText('get profile')
                ->assertSee('TEST2');
      });
    }
    //プロフィール内容が別のユーザの情報が表示されていないかテスト
    //ログインしているユーザがTEST2
    //assertDontSeeでTEST3が表示されていないか確認している。
   public function testProfileNOTUserNameDisplay(){
     $this->browse(function (Browser $browser){
       $browser->loginAs(User::find(2))
               ->visit('/profile')
               ->waitForText('get profile')
               ->assertDontSee('TEST3');
     });
   }
}
