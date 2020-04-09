<?php

use Illuminate\Database\Seeder;
use App\Models\tweet;

class tweetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        for($i = 1;$i <= 10;$i++){

          tweet::create([
            'user_id' => $i,
              'text' => 'テスト' .$i . '投稿' ,
                'user_id' => $i,
                'created_at'     => now(),
                'updated_at'     => now()

          ]);
          if($i >= 2){
            tweet::create([
              'user_id' => $i,
                'text' => 'リプライテスト' .$i . '投稿' ,
                  'user_id' => 1,
                  'reply_tweet_id' => $i ,
                  'created_at'     => now(),
                  'updated_at'     => now()
            ]);
        }


        }
    }
}
