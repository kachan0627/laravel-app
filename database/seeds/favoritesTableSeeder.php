<?php

use Illuminate\Database\Seeder;
use App\Models\favorite;

class favoritesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i= 2; $i<=10; $i++){
          favorite::create([
            'user_id' => 1,
            'tweet_id' => $i,
            'created_at'     => now(),
            'updated_at'     => now()
          ]);
        }
    }
}
