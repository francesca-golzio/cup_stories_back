<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sampleTags = require('config\sampleTags.php');

        //@dd($sampleTags);

        foreach ($sampleTags as $tag) {
            
            $newTag = new Tag();

            $newTag->name = $tag['name'];
            $newTag->label = $tag['label'] ? Str::slug($tag['label'], '_') : Str::slug($tag['name'], '_');
            $newTag->description = $tag['description'];
            $newTag->slug = Str::slug($tag['name']);

            $newTag->save();
        }
    }
}
