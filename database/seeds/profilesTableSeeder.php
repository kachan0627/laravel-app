<?php

use Illuminate\Database\Seeder;
use App\Models\profile;

class profilesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i=1;$i<=10;$i++){
          profile::create([
            'user_id' => $i,
            'introduction' => 'テスト自己紹介' . $i,
            'place' => '大阪',
            'birthday' => '1995-01-11',
            'created_at'     => now(),
            'updated_at'     => now(),
          ]);
        }
    }
}
