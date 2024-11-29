<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        for ($i=0; $i < 10; $i++) { 
            Category::create([
                'name' => 'Category ' . $i
            ]);
        }


        for ($i=0; $i < 80; $i++) { 
            Post::create([
                'title' => 'Tittle '. $i,
                'description' =>fake()->sentence(),
                'text' =>fake()->text(),
                'category_id' =>fake()->numberBetween(1,10),
            ]);
        }
    }
}
