<?php

namespace App\Http\Controllers\Auth;
use App\Services\User\UserServiceInterface;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserServiceInterface $user_service)
    {
        $this->middleware('guest');
        $this->user_service = $user_service;
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'acount_name' => ['required', 'string', 'max:255', 'unique:users'],
            'nick_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],

        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
     //会員登録
    protected function create(array $data)
    {
      try{
        //dd($data);
        //$CreateUser = new User();
        //$CreateUser =$this->user_service->conversionUserClass($data);
        //dd($CreateUser);
        return $this->user_service->DuplicationUserData($data);
        //return $this->user_service->createUserDataService($data);//これはできる
      }catch(\Exception $e){

        return response()->json([],500);
      }
      //return $this->user_service->createUserData($data);
      /*  return User::create([
            'acount_name' => $data['acount_name'],
            'nick_name' => $data['nick_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),

        ]);*/
    }
}
