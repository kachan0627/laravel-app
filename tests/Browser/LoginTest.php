<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Models\User;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */

     //ログインできない場合のテスト（passwordFalse）
    public function testLoginPasswordFalse()
    {

      $this->browse(function (Browser $browser){
          $browser->visit('/login')
                  ->type('email','test3@test.com')
                  ->type('password','1234567')
                  ->press('Login')
                  ->assertPathIsNOT('/home');


      });
    }
     //ログインできる場合のテスト
   public function testLoginTrue()
    {
        $this->browse(function (Browser $browser){
            $browser->visit('/login')
                    ->type('email','test3@test.com')
                    ->type('password','12345678')
                    ->press('Login')
                    ->assertPathIs('/home')
                    ->visit('/logout');


        });
    }


}
