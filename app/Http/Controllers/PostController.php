<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    //Cria um novo post, caso dê erro retorna 400 Bad Request
    public function createPost(Request $request)
    {
        $post = $request->all();
        $postModel = new Post();
        $postModel->title = $post['title'];
        $postModel->description = $post['description'];
        $postModel->by = $post['by'];

        if ($postModel->save())
            return response()->json($post, 201);

        return response()->json(['message' => '400 Bad Request'], 400);
    }

    //Retorna todos os posts, se não tiver nenhum retorna 202
    public function getAllPost()
    {
        $posts = Post::all();

        if (empty($posts))
            return response()->json(['message' => '202 Accepted'], 202);

        return response()->json($posts, 200);
    }

    //Retorna somente o post passado por ID, se não existir retorna 202
    public function getOnlyPost($id)
    {
        $post = Post::find($id);

        if (empty($post))
            return response()->json(['message' => '202 Accepted'], 202);

        return response()->json($post, 200);
    }

    //Apaga o post passado por ID, se não não existir retorna 202, caso exista retorna 200
    public function deletePost($id)
    {
        $post = Post::find($id);

        if (empty($post))
            return response()->json(['message' => '202 Accepted'], 202);

        if (Post::find($id)->delete())
            return response()->json(['message' => '200 OK'], 200);
    }

    //Verifica se o post existe pelo ID, caso não exista retorna 204 No Content e caso exista é atualizado com o que foi passado no corpo
    public function patchPost($id, Request $request)
    {
        $post = Post::find($id);

        if (empty($post))
            return response()->json(['message' => '204 No Content'], 204);

        if ($post->update($request->all()))
            return response()->json($post, 200);

        return response()->json(['message' => '400 Bad Request'], 400);
    }

    /* Verifica se o post existe pelo ID, caso não exista verifica se o corpo tem todos os parâmetros e cria um novo post,
    se não existir todos os parâmetros retorna 400 Bad Request */
    public function putPost($id, Request $request)
    {
        $post = Post::find($id);

        if (empty($post)) {
            $postRequest = $request->all();
            if (empty($postRequest['title']) || empty($postRequest['description']) || empty($postRequest['by']))
                return response()->json(['message' => '400 Bad Request'], 400);

            $postModel = new Post();
            $postModel->title = $postRequest['title'];
            $postModel->description = $postRequest['description'];
            $postModel->by = $postRequest['by'];

            if ($postModel->save())
                return response()->json($postModel, 201);
        }

        return response()->json(['message' => '400 Bad Request'], 400);
    }
}
