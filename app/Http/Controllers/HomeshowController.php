<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use mysql_xdevapi\Session;

class HomeshowController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $cats = Category::all();

        return view('Front', compact('posts', 'cats'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        session()->forget('name');
        session()->forget('email');
        session()->flush();

        $posts = Post::all();
        $cats = Category::all();
        return view('Front', compact('posts', 'cats'));
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
    public function post(){


        $post = Post::all();


        //$comments = $post->comments()->whereIsActive(1)->get();



        return view('home', compact('post'));


    }
}
