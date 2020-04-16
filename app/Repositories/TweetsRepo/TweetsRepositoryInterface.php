<?php

namespace App\Repositories\TweetsRepo;
use Illuminate\Http\Request;
interface TweetsRepositoryInterface
{
  // code...
  public function postTweets(Request $request);
}
