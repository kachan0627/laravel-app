<?php
namespace App\Services\Tweet;

use App\Repositories\TweetsRepo\TweetsRepositoryInterface;
//use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\tweet;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Support\Facades\Auth;

class TweetService implements TweetServiceInterface
{
  public function __construct(TweetsRepositoryInterface $tweet_repository)
  {
    $this->TweetsRepository = $tweet_repository;

  }

  public function postTweetsService(Request $request)
  {
    return $this->TweetsRepository->postTweets($request);
  }

  public function getTweetsService(int $id)
  {
    return $this->TweetsRepository->getTweets($id);
  }
  //チェック関数を統合している。
  public function checkTweets(Request $request)
  {
    $checktweet = new tweet();
    $checktweet->user_id = $request->input('user_id');
    $checktweet->text = $request->input('text');
    $this->checkTweetsUserIDNULL($checktweet);
    //$this->checkTweetsUserIDNotDB($addtweet->user_id);
    $this->checkTweetsBlank($checktweet);
    return $this->TweetsRepository->postTweets($request);

  }

  //ユーザIDが取得できているか確認。
  private function checkTweetsUserIDNULL(tweet $tweet)
  {
    if($tweet->user_id == NULL){
      Log::debug('user_idが指定されていません');
      throw new Exception("Error-checkTweetsUserID");
    }else{
      Log::debug('user_idが指定されています');
    }
  }
  //ユーザIDが存在するか確認する処理
  /*private function checkTweetsUserIDNotDB(int $userId)
  {
    Log::debug($userId);
    //ユーザが存在しているか確認するためのフラッグ
    $userFoundFlag = false;
    //全てのユーザ情報を$AllUserList[]に格納
    $AllUserList[] = new User();
    $AllUserList = $this->user_repository->getUserRecord(-1);
    //ユーザがDBに存在するか確認する処理
    for($ArrayCount = 0;$ArrayCount < count($AllUserList); $ArrayCount++)
    {
      if($AllUserList[$ArrayCount]->id == $userId)
      {
        $userFoundFlag = true;
      }
    }
    //
    if(!$userFoundFlag)
    {
      Log::debug('user_idがDBに存在していません');
      throw new Exception("Error-checkTweetsUserIDNotDB");
    }else{
      Log::debug('user_idがDBに存在しています');
    }


  }*/

  //投稿されたテキストが空だった場合、エクセプションを発生させる
  private function checkTweetsBlank(tweet $tweet)
  {
    if($tweet->text == NULL){
      Log::debug('テキストが空です');
      throw new Exception("Error-checkTweetsBlank");
    }else{
      Log::debug('テキストに入力されています');
    }
  }
  //ログイン中のユーザーの投稿のみを呼び出す関数
  public function getUserTweets()
  {
    $userId = Auth::id();
    return $this->TweetsRepository->getUserTweets($userId);

  }


}
