<?php

namespace Tests\Unit;
use App\Models\User as User;
use App\Models\tweets;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use App\Repositories\TweetsRepo\TweetsRepositoryInterface;

use Illuminate\Http\Request;
//use Illuminate\Http\Response;

class TweetsTest extends TestCase
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
             \App\Repositories\TweetsRepo\TweetsRepositoryInterface::class,
             \Tests\Mock\Repositories\TweetsRepositoryTest::class,
           );

     }

     public function testTweets(){
      /* //Userクラスの$user生成
       $user = new User();
        $user->acount_name='test_user2';
        $user->nick_name='TEST2';
        $user->email='test2@test.com';
        $user->password='12345678';*/
       //ログイン処理
       $this->json('post','/login',[
         'email' => 'test2@test.com',
         'password' => '12345678'
       ]);
       //ログイン出来ているかチェック
       $this->assertTrue(Auth::check());

       $response = $this->withHeaders(['X-CSRF-TOKEN' => csrf_token()])->json('post','/tweets/tweet_post_json',[
        'user_id'=>'2',
        'text'=>'kdkdkdkd',
      ]);

      //dd($response);
     $response->assertStatus(500);


      //ログアウト処理
        $this->post('/logout');
        $this->assertFalse(Auth::check());
     }
}
