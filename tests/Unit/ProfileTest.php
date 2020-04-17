<?php

namespace Tests\Unit;

use App\Models\profile;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\JsonResponse;
use App\Repositories\Profile\ProfileRepositoryInterface;

class ProfileTest extends TestCase
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
             \App\Repositories\Profile\ProfileRepositoryInterface::class,
             \Tests\Mock\Repositories\ProfileRepositoryTest::class
           );
     }

     public function testGetProfile(){
       //ログイン処理
       $this->json('post','/login',[
         'email' => 'test2@test.com',
         'password' => '12345678'
       ]);
       //ログイン出来ているかチェック
       $this->assertTrue(Auth::check());
       $response= $this->json('get','/tweets/profile_json/1');
       $response->assertStatus(500);
       //ログアウト処理
       $this->post('/logout');
      $this->assertFalse(Auth::check());


     }
}
