<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Category::create([
            'name' => 'car',
            'slug' => 'ferrari',
        ]);

        Category::create([
            'name' => 'personal',
            'slug' => 'nurburgring',
        ]);

        Category::create([
            'name' => 'life',
            'slug' => 'car collection',
        ]);

        User::create([
            'name' => 'cello',
            'username' => 'sir celloz',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('1234'),
        ]);

        User::factory(2)->create();
        Post::factory(20)->create();
    }
}
