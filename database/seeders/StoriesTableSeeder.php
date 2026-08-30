<?php

namespace Database\Seeders;

use App\Models\Story;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class StoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $sampleImages = Storage::disk('public')->files('seeders/sampleimages');

        for ($i = 0; $i < 12; $i++) {

            $newStory = new Story();

            $newStory->title = Str::of($faker->sentence())->remove('.');
            $newStory->content = $faker->paragraphs(3, true);
            $newStory->slug = Str::slug($newStory->title, '-');
            $newStory->author_id = rand(1, 7);            
            $newStory->cover_img = $sampleImages[array_rand($sampleImages)];


            /* assign some stories to the sample published issue */
            if($i % 3 == 0) {
                $newStory->issue_id = 2;
            }

            $newStory->save();
            
            /* assign some sample tags to some sample stories */
            $sortedIds = [];

            if($i % 4 == 0) {
                $sortedTags = Tag::all()->random(random_int(1, 3), true);

                foreach ($sortedTags as $tag) {

                    $sortedIds[] = $tag->id;
                }
                
                //dd($sortedTags, $sortedIds);

                $newStory->tags()->attach($sortedIds);
            }
        }
    }    
}