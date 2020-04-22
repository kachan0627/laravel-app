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
    public function testListNotDisplayed()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/home')
                    ->waitForText('get data!')
                    ->assertDontSee('kdknjjgknjfjngjnfgh');
                    //->assertVue('tweets.Array[29].text','かか','./components/List.vue');

        });
    }
}
