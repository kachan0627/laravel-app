<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use追加

use App\Services\User\UserServiceInterface;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\profile;
use App\Models\tweet;
use App\Models\follow;
use App\Http\Resources\User AS UserResource;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct(UserServiceInterface $user_service)
     {
       $this->middleware('auth');
       //$this->user_repository = $user_repository;
       $this->user_service = $user_service;

     }


    public function index(User $user)
    {

        $all_users =$user->getAllUsers(auth()->user()->id);
        return view('users.index', [
          'all_users' => $all_users,
        ]);
        //return UserResource::collection(User::all());
    }

    public function follow(User $user)
    {
      $follower= auth()->user();
      $is_follow = $follower->isFollow($user_id);
      if(!$is_follow){
        $follower->follow($user->id);
        return back();
      }
    }
    public function unfollow(User $user)
    {
      $follower= auth()->user();
      $is_follow = $follower->isFollow($user_id);
      if($is_follow){
        $follower->unfollow($user->id);
        return back();
      }
    }

    public function UserJson(int $id=-1){
      try{
        response()->json();
        return $this->user_service->getUserRecordService($id)->toJson();

      }catch(\Exception $e){
        //dd($e);
        return response()->json([],500);
      }
    }
    //ログインしているユーザーのusertable情報を返却する
    public function loginUser(){
      return $this->user_service->getUserLoginDataService();
    }
    //ログインしているユーザーのidを返却する
    public function loginId(){
      return $this->user_service->getUserLoginIdService();
    }
    //ログアウト処理
    public function logout(){

      Auth::logout();
      return view('login');
    }
    //userを新規登録する
    public function userCreate(array $data){
      //dd('通ってます');
      return $this->user_service->createUserDataService($data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    //デバック用の関数
    //本当はrequest
    /*public function Duplication()
    {
      $TestUser = new User();
      $TestUser->acount_name = 'test_user1';
      $TestUser->nick_name='Test1';
      $TestUser->email = 'test1@test.com';
      $TestUser->password = Hash::make('12345678');
      //dd($TestUser);
      return $this->user_service->DuplicationUserData($TestUser);
    }*/
}
