<?php
namespace Tests\Mock\Repositories;
use Illuminate\Http\Request;
use App\Repositories\TweetsRepo\TweetsRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;
//use Illuminate\Http\JsonResponse;
use Exception;

class TweetsRepositoryTest implements TweetsRepositoryInterface
{


  public function postTweets(Request $request)
  {
    //dd($request->input('text'));
    throw new Exception('postTweets例外発生しています。',500);

  }
}
