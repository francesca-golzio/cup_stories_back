<?php

namespace Database\Seeders;

use App\Models\Issue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class IssuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $sampleImages = Storage::disk('public')->files('seeders/sampleissuesbanner');

        $sampleColors = ['#710fa7', '#0ba83d', '#4575db', '#ff6600', '#003cff', '#0d8392', '#c20a47', '#527716', '#a10c9a'];
        shuffle($sampleColors);
        $x = 0;

        /* DEFAULT ISSUE for unassigned stories */
        $newIssue = new Issue();
    
        $newIssue->title = 'Unassigned Short Stories';
        $newIssue->status = 'draft';
        $newIssue->color = '#8f8f8f';
        $newIssue->pubblication_number = 0;
        $newIssue->slug = Str::slug( $newIssue->pubblication_number . ' ' . $newIssue->title); 
        $newIssue->published_at = now();
        $newIssue->cover_img = "http://localhost:8000/storage/" . $sampleImages[0];
        // $newIssue->cover_img = "http://localhost:8000/storage/" . $sampleImages[array_rand($sampleImages)];

        $newIssue->save();
        
        for ($i = 1; $i < 8; $i++) {
            
            $newIssue = new Issue();
    
            $newIssue->title = $faker->text(50);
            $newIssue->status = 'draft';

            $newIssue->color = $sampleColors[$x];
                $x++;
                
            $newIssue->cover_img = "http://localhost:8000/storage/" . $sampleImages[$i];
            // $newIssue->cover_img = "http://localhost:8000/storage/" . $sampleImages[array_rand($sampleImages)];
            
            /* pubblica la prima issue */
            if ($i >= 1 && $i <= 5) {
                $newIssue->status = 'published';
                $newIssue->pubblication_number = $i;
                $newIssue->published_at = now();
            }
            
            $newIssue->slug = Str::slug( $newIssue->pubblication_number . ' ' . $newIssue->title); 
    
            $newIssue->save();
        }
    }
}
