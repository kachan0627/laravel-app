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
//use App\Http\Controllers\Auth\RegisterController;
//use Test\Mock\Repositories;

class UserRepoTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
     public function setUp():void
     {
         parent::setUp();
        //テスト用のリポジトリ切替
         $this->app->bind(
             \App\Repositories\User\UserRepositoryInterface::class,
             \Tests\Mock\Repositories\UserRepositoryTest::class,
           );

     }


    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testlogin()
    {
        $this->assertFalse(Auth::check());
        //ログイン処理
        $response = $this->json('post','/login',[
          'email' => 'test3@test.com',
          'password' => '12345678'
        ]);
        //ログイン出来ているかチェック
        $this->assertTrue(Auth::check());
        //jsonファイルする際にexceptionを返却する
        //$response= $this->json('get','/getUserRecordByJson');
        /*$response= $this->json('get','/tweets/User_json');
        //exceptionが返却されているか確認する。
        //dd($response);
        $response->assertStatus(500);
        //ログアウト処理
        $this->post('/logout');
        $this->assertFalse(Auth::check());

*/
    }

   public function testcreate()
    {
      $response = $this->get('/');

      $response->assertStatus(200);
      $user = new User();
       $user->acount_name='undertaker';
       $user->nick_name='mr.taker';
       $user->email='taker@taker.com';
       $user->password='aaaaaaaaa';

        //アカウントクリエイトする際にModelNotFoundExceptionを返却する
      /* $response= $this->post(action('UsersController@userCreate',$user));//ここ
        $response->assertStatus(500);*/
        /*$response= $this->json('post','/register')->create([
          'acount_name' =>  'undertaker',
          'nick_name' => 'mr.taker',
          'email' => 'taker@taker.com',
          'password' => 'aaaaaaaaa'
        ]);*/
       //$response= $this->json('get','/tweets/User_json/1');
        //print_r($this->json('get','/tweets/User_json/1'));




    }
}
