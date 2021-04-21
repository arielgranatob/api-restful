<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
    }

    public function createPost(Request $request)
    {

        /* $posts = Post::select("SELECT * FROM users");
        return response()->json($posts, 200); */

        $post = $request->all();
        $postModel = new Post();
        $postModel->title = $post['title'];
        $postModel->save();
        return response()->json($post, 200);
    }
}
