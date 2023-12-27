<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

// use Illuminate\Http\JsonResponse;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $post = Post::paginate(5);
        // return new JsonResponse($post);

        return PostResource::collection($post);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $created = DB::transaction(function() use ($request) {
            $created = Post::create([
                'title' => $request->title,
                'body'  => $request->body
            ]);
            $created->users()->sync($request->user_ids);

            return $created;
        });

        return new PostResource($created);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return new PostResource($post);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $updated = $post->update([
            'title' => $request->title ?? $post->title,
            'body' => $request->body ?? $post->body,
            // Add other fields as needed
        ]);

        if(!$updated)
        {
            return new JsonResponse([
                'errors' => [
                    'Failed to update Model'
                ]
            ], 400);
        }

        return new PostResource($updated);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $deleted = $post->forceDelete();

        if(!$deleted){
            return response()->json([
                'errors' => 'Post Not Found'
            ], 400);
        }

        return response()->json([
            'data' => 'successful'
        ]);
    }
}
