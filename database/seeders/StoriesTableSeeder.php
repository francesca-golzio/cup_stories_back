<?php

namespace Database\Seeders;

use App\Models\Story;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class StoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 10; $i++) {

            $newStory = new Story();

            $newStory->title = Str::of($faker->sentence())->remove('.');
            $newStory->content = $faker->paragraphs(3, true);
            $newStory->cover_img = url('https://picsum.photos/200');
            $newStory->slug = Str::slug($newStory->title, '-');
            $newStory->author_id = rand(1, 7);

            $newStory->save();
        
        }
    }
    
}