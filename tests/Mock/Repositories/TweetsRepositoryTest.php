<?php
namespace Tests\Mock\Repositories;
use Illuminate\Http\Request;
use App\Repositories\TweetsRepo\TweetsRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use App\Models\tweet;
//use Illuminate\Http\JsonResponse;
use Exception;

class TweetsRepositoryTest implements TweetsRepositoryInterface
{


  public function postTweets(tweet $tweet)
  {
    //dd($request->input('text'));
    throw new Exception('postTweets例外発生しています。',500);

  }

  public function getTweets(int $id=-1)
  {
    throw new Exception('getTweets例外発生しています。');
  }
  public function getUserTweets(int $id=-1)
  {
    throw new Exception('getUserTweets例外発生しています。');
  }
}
