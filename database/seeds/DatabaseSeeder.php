<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        $this->call([
          //
          usersTableSeeder::class,
          tweetsTableSeeder::class,
          favoritesTableSeeder::class,
          followsTableSeeder::class,
          profilesTableSeeder::class,
        ]);
    }
}
