<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Request\storePost;
use App\Http\Resources\PostResource;
use App\Http\Resources\PostCollection;
use App\Post;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return new PostCollection(Post::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storePost $request)
    {
        $post = new Post;
        $post->user_id = $request->user_id;
        $post->category_id = $request->category_id;
        $post->image = $request->image;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        return new PostResource($post);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return new PostResource($post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->user_id = $request->user_id;
        $post->category_id = $request->category_id;
        $post->image = $request->image;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->save();
        return new PostResource($post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
    }
}
