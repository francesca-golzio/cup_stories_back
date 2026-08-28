<?php

namespace Database\Seeders;

use App\Models\Issue;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

class IssuesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        /* DEFAULT ISSUE for unassigned stories */
        $newIssue = new Issue();
    
        $newIssue->title = 'Unassigned Short Stories';
        $newIssue->status = 'draft';
        $newIssue->color = '#8f8f8f';
        $newIssue->cover_img = url('https://picsum.photos/'.rand(800, 900));
        $newIssue->slug = Str::slug( $newIssue->edition_number . ' ' . $newIssue->title); 
        $newIssue->pubblication_number = 0;
        $newIssue->published_at = now();

        $newIssue->save();
        
        for ($i = 0; $i < 3; $i++) {
            
            $newIssue = new Issue();
    
            $newIssue->title = $faker->text(50);
            $newIssue->status = 'draft';
            $newIssue->color = $faker->hexColor();
            $newIssue->cover_img = url('https://picsum.photos/'.rand(800, 900));
            $newIssue->slug = Str::slug( $newIssue->edition_number . ' ' . $newIssue->title); 
            
            /* pubblica la prima issue */
            if ($i == 0) {
                $newIssue->status = 'published';
                $newIssue->pubblication_number = 1;
                $newIssue->published_at = now();
            }
    
            $newIssue->save();
        }
    }
}
