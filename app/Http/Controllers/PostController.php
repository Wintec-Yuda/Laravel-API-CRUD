<?php

namespace App\Http\Controllers;

use App\Http\Resources\PostResource;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        $response = [
            'success' => true,
            'data' => PostResource::collection($posts),
            'message' => 'Post Successfully Retrieved'
        ];

        return response()->json($response);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $post = Post::create($validate);

        $response = [
            'success' => true,
            'data' => new PostResource($post),
            'message' => 'Post successfully created',
        ];

        return response()->json($response);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $response = [
            'success' => true,
            'data' => new PostResource($post),
            'message' => 'post successfully showing'
        ];
        return response()->json($response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $validate = $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);
        $post->update($validate);
        $response = [
            'success' => true,
            'data' => new PostResource($post),
            'message' => 'Post successfully updated'
        ];
        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        $response = [
            'success' => true,
            'data' => new PostResource($post),
            'message' => 'Post successfully deleted'
        ];
        return response()->json($response);
    }
}
