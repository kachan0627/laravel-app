<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class usersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i = 1; $i <= 10; $i++){

          User::create([
            'acount_name' => 'test_user' .$i ,
            'nick_name' => 'TEST' .$i,
            'profile_image' => 'https://placehold.jp/50x50.png',
            'email' => 'test' . $i . '@test.com',
            'password' => Hash::make('12345678'),
            'created_at'     => now(),
            'updated_at'     => now()
          ]);


        }
    }
}
