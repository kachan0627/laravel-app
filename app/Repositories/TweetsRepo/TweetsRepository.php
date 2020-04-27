<?php
namespace App\Repositories\TweetsRepo;
use App\Models\tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//use App\Models\User;
class TweetsRepository implements TweetsRepositoryInterface
{
/*  public function __construct(tweet $tweet){
    $this->tweet =$tweet;
  }*/




  public function postTweets(Request $request)
  {
    $addtweet =new tweet();
    $addtweet->user_id = $request->input('user_id');
    $addtweet->text = $request->input('text');
    $addtweet->save();
    return $addtweet;
  }

  public function getTweets(int $id=-1)
  {
    if($id == -1){
        return tweet::get();
      }else{
        return tweet::find($id);
      }
  }

}
