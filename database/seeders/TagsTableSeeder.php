<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
            $newTag->label = $tag['label'];
            $newTag->description = $tag['description'];

            $newTag->save();
        }
    }
}
