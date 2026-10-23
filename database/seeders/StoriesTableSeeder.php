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

        for ($i = 0; $i < 50; $i++) {

            $newStory = new Story();

            $newStory->title = Str::of($faker->sentence())->remove('.');
            $newStory->content = $faker->paragraphs(12, true);
            $newStory->slug = Str::slug($newStory->title, '-');
            $newStory->author_id = rand(1, 7);
            $newStory->cover_img = env('APP_URL') . "/" . "storage/" . $sampleImages[array_rand($sampleImages)];


            /* assign stories to issues */
            if($i <= 8) {
                $newStory->issue_id = 2;

            } elseif ($i > 8 && $i <= 16) {
                $newStory->issue_id = 3;

            } elseif ($i > 16 && $i <= 24) {
                $newStory->issue_id = 4;

            } elseif ($i > 24 && $i <= 32) {
                $newStory->issue_id = 5;

            } elseif ($i > 32 && $i <= 40) {
                $newStory->issue_id = 6;

            } else {
                $newStory->issue_id = 1;
            }
            
            $newStory->save();

            /* assign tags to stories */
            $sortedIds = [];
            $sortedTags = Tag::all()->random(random_int(1, 3), true);

            foreach ($sortedTags as $tag) {
                $sortedIds[] = $tag->id;
            }
            
            $newStory->tags()->attach($sortedIds);


            // /* assign some stories to the sample published issue */
            // if($i % 3 == 0) {
            //     $newStory->issue_id = 2;
            // }
            
            // /* assign some sample tags to some sample stories */
            // $sortedIds = [];

            // if($i % 4 == 0) {
            //     $sortedTags = Tag::all()->random(random_int(1, 3), true);

            //     foreach ($sortedTags as $tag) {

            //         $sortedIds[] = $tag->id;
            //     }
                
            //     //dd($sortedTags, $sortedIds);

            //     $newStory->tags()->attach($sortedIds);
            // }
        }
    }    
}