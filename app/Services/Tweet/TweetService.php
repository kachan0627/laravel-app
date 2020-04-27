<?php
namespace App\Services\Tweet;

use App\Repositories\TweetsRepo\TweetsRepositoryInterface;
use Illuminate\Http\Request;
use App\Models\tweet;
use Illuminate\Support\Facades\Log;
use Exception;

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
  //投稿されたテキストが空だった場合、エクセプションを発生させる
  public function checkTweetsBlank(Request $request)
  {
    $checktweet = new tweet();
    $checktweet->text = $request->input('text');
    if($checktweet->text==NULL){
      Log::debug($checktweet->text);
      Log::debug('テキストが空です');
      throw new Exception("Error");

    }else{
      Log::debug($checktweet->text);
      Log::debug('テキストに入力されています');
      return $this->TweetsRepository->postTweets($request);
    }
  }

}
