<?php

namespace App\Http\Controllers;
use App\Repositories\TweetsRepo\TweetsRepositoryInterface;
use App\Repositories\Profile\ProfileRepositoryInterface;
//use App\Http\Resources\tweet AS TweetResource;
use App\Http\Resources\User AS UserResource;
use App\Models\tweet;
use App\Models\profile;
use App\Models\follow;
use App\Models\favorite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Http\JsonResponse;

class TweetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct(TweetsRepositoryInterface $tweet_repository,ProfileRepositoryInterface $profile_repository)
     {
       $this->middleware('auth');
       $this->tweet_repository = $tweet_repository;
       $this->profile_repository = $profile_repository;

     }

    public function index()
    {
        //
        return TweetResource::collection(tweet::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,User $user)
    {
        //保存
        $tweet = new tweet;
        $tweet->user_id = $user->id;
        $tweet->text = $request->input('content','');
        $tweet->save();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(tweet $tweet)
    {
        //一件表示
        return new TweetResource($tweet);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  /*  public function show($id)
    {
        //
    }*/

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  /*  public function edit($id)
    {
        //
    }*/

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tweet $tweet)
    {
        //
        $tweet->text = $request->input('content','');
        $topic->save();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(tweet $tweet)
    {
        //
        $tweet->delete();
    }
    //tweetテーブルをjsonファイルで出力
    public function tweetJson(int $id=-1){
        try{
        return $this->tweet_repository->getTweets($id);
      }catch(\Exception $e){
        return response()->json([],500);
      }
    }
    //tweet追加
    public function tweetPostJson(Request $request){
    /*  $addtweet =new tweet();
      $addtweet->user_id = $request->input('user_id');
      $addtweet->text = $request->input('text');
      $addtweet->save();*/
        try{
        //print_r('$this->tweet_repository->postTweets($request)');
        //dd($request);
        $this->tweet_repository->postTweets($request);
        return response()->json();
      }catch(\Exception $e){
        print_r('tweetPostエクセプション通ってます');
        //dd($e);
        return response()->json([],500);
      }


    }
    //profileを編集
    public function profileUpdate(Request $request){
      $updateprof =profile::find($request->input('user_id'))->toJson();
      $updateprof->introduction = $request->input('introduction');
      $updateprof->place = $request->input('place');
      $updateprof->birthday = $request->input('birthday');
      $updateprof->save();

    }
    //profileテーブルをjsonファイルで出力
    public function profileJson(int $id=-1){
      try{
        return $this->profile_repository->getProfile($id);
      }catch(\Exception $e){
        print_r('getProfileエクセプション通ってます');
        //dd($e);
        return response()->json([],500);
      }

    }
    //favoriteテーブルをjsonファイルで出力
    public function favoriteJson(int $id){
      if($id == -1){
        return favorite::get()->toJson();
      }else{
        return favorite::find($id)->toJson();
      }
    }

    //followテーブルをjsonファイルで出力
    /*public function follow_json($id = -1){
      if($id == -1){
        return follow::get()->toJson();
      }else{
        return follow::find($id)->toJson();
      }
    }*/


}
