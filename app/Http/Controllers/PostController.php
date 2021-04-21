<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class PostController extends Controller
{
    public function createPost(Request $request)
    {
        $post = $request->all();
        $postModel = new Post();
        $postModel->title = $post['title'];
        $postModel->description = $post['description'];
        $postModel->by = $post['by'];
        $postModel->save();
        return response()->json($post, 201);
    }

    public function getAllPost()
    {
        $posts = Post::all();
        return response()->json($posts, 200);
    }

    public function getOnePost($id)
    {
        $post = Post::find($id);
        return response()->json($post, 200);
    }

    public function deletePost($id)
    {
        Post::findOrFail($id)->delete();
        return response('Deleted successfully', 200);
    }

    public function putPost($id, Request $request)
    {
        $post = Post::findOrFail($id);
        $post->update($request->all());
        return response()->json($post, 200);
    }
}
