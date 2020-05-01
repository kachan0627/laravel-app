<?php
namespace App\Services\Tweet;

use App\Repositories\TweetsRepo\TweetsRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\tweet;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Support\Facades\Auth;

class TweetService implements TweetServiceInterface
{
  public function __construct(TweetsRepositoryInterface $tweetRepository,UserRepositoryInterface $userRepository)
  {
    $this->TweetsRepository = $tweetRepository;
    $this->userRepository = $userRepository;
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
  public function checkTweets(int $userId,string $text)
  {
    //userIdがDBに存在するならば投稿する
    if($this->userRepository->getUserRecord($userId))
    {
      $checktweet = new tweet();
      $checktweet->user_id = $userId;
      $checktweet->text = $text;
      return $this->TweetsRepository->postTweets($checktweet);
    }else{
      return false;
    }
  }

  //ユーザIDが取得できているか確認。
/*  private function checkTweetsUserIDNULL(tweet $tweet)
  {
    if($tweet->user_id == NULL){
      Log::debug('user_idが指定されていません');
      throw new Exception("Error-checkTweetsUserID");
    }else{
      Log::debug('user_idが指定されています');

    }
  }*/


  //投稿されたテキストが空だった場合、エクセプションを発生させる
  /*private function checkTweetsBlank(tweet $tweet)
  {
    if($tweet->text == NULL){
      Log::debug('テキストが空です');
      throw new Exception("Error-checkTweetsBlank");
    }else{
      Log::debug('テキストに入力されています');
    }
  }*/
  //ログイン中のユーザーの投稿のみを呼び出す関数
  public function getUserTweets()
  {
    $userId = Auth::id();
    return $this->TweetsRepository->getUserTweets($userId);

  }


}
