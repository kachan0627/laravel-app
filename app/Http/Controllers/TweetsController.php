<?php

namespace App\Http\Controllers;

//use App\Http\Resources\tweet AS TweetResource;
use App\Http\Resources\User AS UserResource;
use App\Models\tweet;
use App\Models\profile;
use App\Models\follow;
use App\Models\favorite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TweetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
     {
         $this->middleware('auth');
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
    public function tweet_json($id = -1){
      if($id == -1){
        return tweet::get()->toJson();
      }else{
        return tweet::find($id)->toJson();
      }
    }
    //tweet追加
    public function tweet_post_json(Request $request){
      $addtweet =new tweet();
      $addtweet->user_id = $request->input('user_id');
      $addtweet->text = $request->input('text');
      $addtweet->save();

    }
    //profileを編集
    public function profile_update(Request $request){
      $updateprof =profile::find($request->input('user_id'))->toJson();
      $updateprof->introduction = $request->input('introduction');
      $updateprof->place = $request->input('place');
      $updateprof->birthday = $request->input('birthday');
      $updateprof->save();

    }
    //profileテーブルをjsonファイルで出力
    public function profile_json($id = -1){
      if($id == -1){
        return profile::get()->toJson();
      }else{
        return profile::find($id)->toJson();
      }
    }
    //favoriteテーブルをjsonファイルで出力
    public function favorite_json($id = -1){
      if($id == -1){
        return favorite::get()->toJson();
      }else{
        return favorite::find($id)->toJson();
      }
    }
    //followテーブルをjsonファイルで出力
    public function follow_json($id = -1){
      if($id == -1){
        return follow::get()->toJson();
      }else{
        return follow::find($id)->toJson();
      }
    }
    //Userテーブルをjsonファイルで出力
    public function User_json($id = -1){
      if($id == -1){
        return User::get()->toJson();
      }else{
        return User::find($id)->toJson();
      }
    }

    public function login_user(){
      return Auth::user();
    }
    public function login_id(){
      return Auth::id();
    }
    public function logout(){

      Auth::logout();
      return view('login');
    }
}
