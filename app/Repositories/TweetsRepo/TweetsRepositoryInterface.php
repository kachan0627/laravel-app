<?php

namespace App\Repositories\TweetsRepo;
use Illuminate\Http\Request;
use App\Models\tweet;

interface TweetsRepositoryInterface
{
  // code...
  public function postTweets(tweet $tweet);
  public function getTweets(int $id);
  public function getUserTweets(int $id);
}
