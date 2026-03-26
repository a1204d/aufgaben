<?php



namespace App\Http\Controllers;



use App\Models\Topic;

use Illuminate\Http\Request;



class TopicController extends Controller

{

    public function posts(string $slug)

    {

        $topic = Topic::where('slug', '=', $slug)->first();



        return $topic->posts;

    }



    public function index()

    {

        return Topic::get();

    }

}
