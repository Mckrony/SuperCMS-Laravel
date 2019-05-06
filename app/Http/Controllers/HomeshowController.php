<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;


class HomeshowController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(2);
        $cats = Category::all();
//        $rl = User::all();
        //$role = 0;
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $rl = User::where('id', '=', $user_id)->get();
            foreach ($rl as $r) {
                $role = $r['role_id'];
                //return $role;
                session(['key' => $role]);
                return view('Front', compact('posts', 'cats'));
            }
        }



        return view('Front', compact('posts', 'cats'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        session()->forget('name');
        session()->forget('email');
        session()->forget('key');
        session()->flush();

        $posts = Post::paginate(2);
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
