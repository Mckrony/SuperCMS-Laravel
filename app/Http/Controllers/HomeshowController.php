<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;

class HomeshowController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function create()
    {
        //
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
