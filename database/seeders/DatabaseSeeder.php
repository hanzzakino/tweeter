<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Tweets;
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
        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'name' => 'Tony Stark',
            'email' => 'ironman@example.com',
            'password' => bcrypt('ironman@example.com')
        ]);

        Tweets::factory(10)->create([
            'user_id' => 1,
            'content' => 'Sample Tweet',
            'liked' => false,
        ]);
    }
}
