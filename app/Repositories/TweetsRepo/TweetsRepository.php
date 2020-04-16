<?php
namespace App\Repositories\TweetsRepo;
use App\Models\tweet;

class TweetsRepository implements TweetsRepositoryInterface
{
  public function postTweets(Request $request){
    $addtweet =new tweet();
    $addtweet->user_id = $request->input('user_id');
    $addtweet->text = $request->input('text');
    $addtweet->save();
  }

}
