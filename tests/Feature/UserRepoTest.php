<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Repositories\User\UserRepositoryInterface;
//use Test\Mock\Repositories;

class UserRepoTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testlogin()
    {

      //テスト用のリポジトリ切替
      $this->app->bind(
          \App\Repositories\User\UserRepositoryInterface::class,
          \Tests\Mock\Repositories\UserRepositoryTest::class,
        );
        //$this->assertFalse(Auth::check());
        //ログイン処理
        $response = $this->json('post','/login',[
          'email' => 'test2@test.com',
          'password' => '12345678'
        ]);
        //ログイン出来ているかチェック
        //$this->assertTrue(Auth::check());
        //$response= $this->get('/home');
        //$response->assertStatus(200);
        $response= $this->json('get','/tweets/User_json');
       //$response= $this->json('get','/tweets/User_json/1');
        //print_r($this->json('get','/tweets/User_json/1'));
        $response->assertStatus(500);
        //ログアウト処理
        $this->post('/logout');
        $this->assertFalse(Auth::check());


    }
}
