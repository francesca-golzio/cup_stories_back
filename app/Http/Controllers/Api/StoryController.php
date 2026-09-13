<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StoryController extends Controller
{
    /* get the published STORIES LIST */
    public function index(Request $request) {
        
       $query = Story::with('author', 'issue', 'tags')
            ->where('issue_id', '!=', 1)
            ->whereHas('issue', function ($q) {
                $q->where('status', 'published');
            });

        if ($request->boolean('paginate', true)) {   /* ?paginate=true or nothing */
            $perPage = $request->integer('perPage', 6);
            $stories = $query->paginate($perPage);
        } else {
            $stories = $query->get();                /* ?paginate=false */
        }
            
        return response()->json(
            [
                'success' => true,
                'results' => $stories,
            ]
        );
    }

    
    /* get a RANDOM published STORY (pass only the cover_img and the incipit for preview and the slug for building the link) */
   public function random() {

       $story = Story::query()
       ->select(['cover_img', 'slug', 'content'])
       ->whereHas('issue', fn ($query) => 
           $query->where('status', 'published')
       )
       ->inRandomOrder()
       ->first();

        if (!$story) {

            return response()->json([
                'success' => false,
                'message' => 'No story found',
            ], 404);            
        }

        return response()->json([
            'success' => true,
            'results' => [
                'cover_img' => $story->cover_img,
                'slug' => $story->slug,
                'incipit' => Str::of(strip_tags($story->content))->substr(0, 200) . '...',
            ]
        ]);
       
   }

    /* get the STORY DETAIL */
    public function show(Story $story) {
                        
        if ($story->issue_id != 1 && $story->issue->status == 'published') {
            $story->load('author', 'issue', 'tags');
            $res = [
                'success' => true,
                'results' => $story,
            ];

        } else {
            $res = [
                'success' => false,
                'message' => 'Story not found',
            ];
        }
            
        return response()->json($res);
    }
}
