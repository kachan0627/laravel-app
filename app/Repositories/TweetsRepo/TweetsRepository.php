<?php
namespace App\Repositories\TweetsRepo;
use App\Models\tweet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
//use App\Models\User;
class TweetsRepository implements TweetsRepositoryInterface
{
/*  public function __construct(tweet $tweet){
    $this->tweet =$tweet;
  }*/



  //投稿したい文章をツイートモデルの変数を新しく作成して保存する
  public function postTweets(Request $request)
  {
    //Log::debug('postTweets通ってます');
    $addtweet =new tweet();
    $addtweet->user_id = $request->input('user_id');
    $addtweet->text = $request->input('text');
    $addtweet->save();
    return $addtweet;
  }
  //全投稿情報取得。または一件取得。
  public function getTweets(int $id=-1)
  {
    if($id == -1){
        return tweet::get();
      }else{
        return tweet::find($id);
      }
  }

  public function getUserTweets(int $id)
  {
        return tweet::where('user_id',$id)->get();

  }

}
