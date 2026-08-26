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
        for ($i = 0; $i < 3; $i++) {
            
            $newIssue = new Issue();
    
            $newIssue->title = $faker->text(50);
            $newIssue->status = 'draft';
            /* $newIssue->pubblication_number = ;
            $newIssue->published_at = ; */
            $newIssue->color = $faker->safeHexColor();
            $newIssue->cover_img = url('https://picsum.photos/'.rand(800, 900));
            $newIssue->slug = Str::slug( $newIssue->edition_number . ' ' . $newIssue->title); 
    
            $newIssue->save();
        }
    }
}
