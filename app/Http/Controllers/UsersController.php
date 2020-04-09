<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//use追加
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
//use App\Models\User;
use App\Models\profile;
use App\Models\tweet;
use App\Models\follow;
use App\Http\Resources\User AS UserResource;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
}
