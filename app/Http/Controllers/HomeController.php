<?php

namespace App\Http\Controllers;

use App\Category;
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
        $posts = Post::paginate(2);
        $cats = Category::all();
        //$pd = $posts->title;

        // $comments = $post->comments()->whereIsActive(1)->get();

        //dd($posts);
        return view('Front', compact('posts', 'cats'));
        //return $posts;
    }


}
