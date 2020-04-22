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
     //プロフィールが表示されているかテスト
    public function testProfileDisplay(){
      $this->browse(function (Browser $browser){
        $browser->loginAs(User::find(2))
                ->visit('/profile')
                ->assertPathIs('/profile');
      });
    }
}
