<?php

namespace App\Services\Tweet;
use Illuminate\Http\Request;

interface TweetServiceInterface
{
  public function postTweetsService(Request $request);
  public function getTweetsService(int $id);
  public function checkTweets(int $userId,string $text);
  public function getUserTweets();
}
