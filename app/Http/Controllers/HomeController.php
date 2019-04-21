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
        $post = Post::all();

        // $comments = $post->comments()->whereIsActive(1)->get();


        return view('post', compact('post'));
    }
}
