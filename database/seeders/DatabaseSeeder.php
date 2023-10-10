<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Forum::factory(20)->create();
        \App\Models\Post::factory(50)->create();
        \App\Models\Reply::factory(100)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Raul',
        //     'email' => 'raul@gmail.com',
        // ]);
    }
}
