<?php

namespace Tests\Requests;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Http\Requests\CreateTweetRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class CreateTweetRequestTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
  /*  public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }*/
    //投稿機能のバリデーションテスト
    //@param $item string 項目名
    //@param $data string 値
    //@param $expect bool 期待値
    /**
    *@dataProvider dataproviderExample
    */
    public function testCreateTweetRequest($itemId,$dataId,$itemText,$dataText,$expect)
    {
      
      //入力項目（$item）と対応する値（$data）
      $dataList = [$itemId => $dataId,
                   $itemText => $dataText];
      //CreateTweetRequestクラス作成
      $request = new CreateTweetRequest();
      //フォームリクエストで定義したルールを取得する
      $rules = $request->rules();
      //Validatorファサードでバリデーターのインスタンスを取得
      //入力データとバリデーションルールを渡す
      $validator = Validator::make($dataList,$rules);
      //入力情報がバリデーションルールを満たしている場合はtrue,
      //そうでなければfalseを返却する
      $result = $validator->passes();
      //期待値$expectと$resultを比較する
      $this->assertEquals($expect,$result);

    }

    public function dataproviderExample()
    {
      return [
        //idのテスト（textは固定）
        '正常' => ['user_id','1','text','こんにちは',true],
        '必須エラー' => ['user_id','','text','こんにちは',false],
        //textのテスト（idは固定）
        '正常' => ['user_id','1','text','こんにちは',true],
        '必須エラー' => ['user_id','1','text','',false],
        '最大文字数エラー' => ['user_id','1','text',str_repeat('a',256),false],
      ];
    }
}
