<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AuthorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $sampleProfilePics = Storage::disk('public')->files('seeders/sampleprofilepics');
        shuffle($sampleProfilePics);
        $x = 0;
        
        for ($i = 0; $i < 7; $i++) {

            $newAuthor = new Author();

            $newAuthor->name = $faker->firstName();
            $newAuthor->surname = $faker->lastName();
            $newAuthor->bio = $faker->text(450);
            $newAuthor->slug = Str::slug($newAuthor->name . ' ' . $newAuthor->surname, '-') ;

            $newAuthor->photo =  "http://localhost:8000/storage/" . $sampleProfilePics[$x];
            $x++;

            $newAuthor->save();
        }
    }
}
