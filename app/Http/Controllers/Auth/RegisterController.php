<?php

namespace App\Http\Controllers\Auth;
use App\Repositories\User\UserRepositoryInterface;
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
    public function __construct(UserRepositoryInterface $user_repository)
    {
        $this->middleware('guest');
        $this->user_repository = $user_repository;
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
      return $this->user_repository->createUserData($data);
      /*  return User::create([
            'acount_name' => $data['acount_name'],
            'nick_name' => $data['nick_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),

        ]);*/
    }
}
