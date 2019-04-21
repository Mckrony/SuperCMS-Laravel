<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::all();
        //$pd = $posts->title;

        // $comments = $post->comments()->whereIsActive(1)->get();

        //dd($posts);
        return view('home', compact('posts'));
        //return $posts;
    }
}
