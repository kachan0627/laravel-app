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

class UserTest extends TestCase
{

    /**
     * A basic feature test example.
     *
     * @return void
     */
     //use DatabaseTransactions;
    //use RefreshDatabase;
  /*  public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        //$this->assertTrue(true);
    }*/
    protected $user;

    public function setUp():void
    {
        parent::setUp();

        //テストデータ作成
      //  $this->user = factory(User::class,1)->create();
      /*  $this->user = factory(User::class)->create([
          'acount_name' => 'testes1',
          'nick_name' => 'tecchan1',
          'email' => 'testes@test.com',
          'password' =>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);*/
        //dd($this->user);
    }

   public function testUserLogin()
    {

      $this->assertTrue(true);
      $this->post('/login',[
        'email' => 'test1@test.com',
        'password' => '12345678'
      ]);
      $response= $this->get('/home');
      $this->assertTrue(Auth::check());
      $response->assertStatus(200);
    //  dd($this->user);

      //ログイン状態では無いことを確認する
      //$this->assertFalse(Auth::check());
      //ログイン処理(作成したテストユーザのemail呼び出し)
      /*$response = $this->withoutMiddleware()->post('login',[
        'email'=>'shyanne86@example.net',
        'password'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
      ]);*/
      //認証されているかチェック
      //$this->assertTrue(Auth::check());
      //$response->assertStatus(200);
      /*
      //ログイン処理(作成したテストユーザのemail呼び出し)
      $response = $this->json('POST',route('login'),[
        'email'=>$this->user->email,
        'password'=> '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
      ]);
      dd($this->user);
      //responseが返却されユーザ名取得
      $response->assertStatus(200)->assertJson(['name'=> $this->user->name]);
      //指定されたユーザが認証されていることを確認
      $this->assertAuthenticatedAs($this->user);
      */
      /*$this->visit('/login')
           ->type($user->email,'email')
           ->type('$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi','password')
           ->press('ログイン')
           ->seePageIs('/home');*/

    }
   /*public function testHello(){
      $this->assertTrue(true);
      $arr = [];
      $this->assertEmpty($arr);
      $msg ="Hello";
      $this->assertEquals('Hello',$msg);
      $n = random_int(0,100);
      $this->assertLessThan(100,$n);
    }*/


}
