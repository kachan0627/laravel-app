<?php

use Illuminate\Database\Seeder;
use App\Models\follow;

class followsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i = 1; $i <= 10; $i++) {
            follow::create([
              'user_id' => 1,
              'follow_id' => $i,
              'created_at'     => now(),
              'updated_at'     => now()
            ]);
        }
    }
}
