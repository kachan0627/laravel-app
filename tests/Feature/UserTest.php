<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use App\Models\User;


class UserTest extends TestCase
{
  use DatabaseTransactions;
    /**
     * A basic feature test example.
     *
     * @return void
     */

  /*  public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        //$this->assertTrue(true);
    }*/
   public function testUserLogin()
    {
      //偽のユーザを作成
      $user = factory(User::class,'student')->create();
      //ログイン処理
      $this->visit('/login')
           ->type($user->email,'email')
           ->type('secret','password')
           ->press('ログイン')
           ->seePageIs('/home');

    }
}
