<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
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
        User::factory()->has(Post::factory(10))->create([
            'name' => 'Tony Messias',
            'email' => 'tonysm@hey.com',
        ]);
        User::factory(10)->has(Post::factory(10))->create();
    }
}
