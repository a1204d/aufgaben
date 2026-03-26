<?php



namespace App\Http\Controllers;



use App\Models\Post;


class PostController extends Controller

{

    public function index()

    {

        $posts = Post::with(['topic'])->get();



        return $posts->map(function ($post) {

            return [

                'id' => $post->id,

                'title' => $post->title,

                'content' => $post->content,

                'topic' => $post->topic

            ];

        });

    }

}
