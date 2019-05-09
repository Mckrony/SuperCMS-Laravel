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
        $posts = Post::paginate(4);
        $cats = Category::all();
//        $rl = User::all();
        //$role = 0;
        if (Auth::check()) {
            $user_id = Auth::user()->id;
            $rl = User::where('id', '=', $user_id)->get();
            foreach ($rl as $r) {
                $role = $r['role_id'];
                $named = $r['name'];
                //return $named;
                session(['key' => $role]);
                //session(['key' => $named]);
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
        $par = $request['search'];
        $posts = Post::where('title', 'like', '%' . $par . '%')->paginate(2);
        // return $s;
        $cats = Category::all();
        return view('Front', compact('posts', 'cats'));


    }

    public function show($id)
    {
        $ids = $id;
        $user = User::where('id', '=', $ids)->get();
        //return $user;
       return view('profiles', compact('user'));
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
    public function post($id){


        $posts = Post::where('category_id', $id)->paginate(2);
        $cats = Category::all();


        //$comments = $post->comments()->whereIsActive(1)->get();



        return view('Front', compact('posts', 'cats'));


    }
}
