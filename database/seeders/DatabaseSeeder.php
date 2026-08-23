<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Env;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(StoriesTableSeeder::class);

        /* Develop Admin Test User */
        User::factory()->create([
            'name' => 'oggi',
            'email' => 'oggi@mail.com',
            'password' => Env::get('PASSWORD'),
        ]);
    }
}
