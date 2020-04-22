<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Models\User;

class SearchTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
     //ユーザ一覧が表示されているかテスト
     public function testSearchDisplayed()
     {
       $this->browse(function (Browser $browser){
         $browser->loginAs(User::find(2))
                 ->visit('/search')
                 ->assertPathIs('/search');

       });
     }
     //ユーザ一覧にDB情報が表示されているかテスト（browser）
    public function testSearchUserNameDisplayed()
    {
      $this->assertDatabaseHas('users',['acount_name'=>'Bonita Bernhard']);
      $this->browse(function (Browser $browser){
        $browser->loginAs(User::find(2))
                ->visit('/search')
                ->waitForText('get data!')
                ->assertSee('Bonita Bernhard');

      });
    }
    //ユーザ一覧にDBに存在しない情報が表示されていないかテスト(browser)
   public function testSearchNotUserNameDisplayed()
   {
     $this->browse(function (Browser $browser){
       $browser->loginAs(User::find(2))
               ->visit('/search')
               ->waitForText('get data!')
               ->assertDontSee('smskfkfmkvmkfk');

     });
   }
   //DBに存在していないユーザ情報が取得できないかテスト
  public function testSearchNotUserNameDB()
  {
    $this->assertDatabaseMissing('users',['acount_name'=>'Bonita Bernh']);
  }


}
