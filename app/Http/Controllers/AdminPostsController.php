<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\PostsCreateRequest;
use App\Photo;
use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class AdminPostsController extends Controller
{

    public function index()
    {
        //
        $posts = Post::paginate(6);



        return view('admin.posts.index', compact('posts','categories'));
    }


    public function create()
    {
        //
        $categories = Category::pluck('name','id')->all();


        return view('admin.posts.create', compact('categories'));
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $user = Auth::user();
        if($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['file'=>$name]);
            $input['photo_id'] = $photo->id;
        }
        $user->posts()->create($input);
        return redirect('/admin/posts');

        //return $input;
    }


    public function show()
    {
//        $posts = Post::all();
//        $c = count($posts);
////        $count_post=$posts->count();
//        return view('admin.index', compact('c'));
    }

    public function edit($id)
    {
        //
        $post = Post::findOrFail($id);

        $categories = Category::pluck('name','id')->all();

        return view('admin.posts.edit', compact('post','categories'));
    }


    public function update(Request $request, $id)
    {
        //
        $input = $request->all();



        if($file = $request->file('photo_id')){


            $name = time() . $file->getClientOriginalName();


            $file->move('images', $name);

            $photo = Photo::create(['file'=>$name]);


            $input['photo_id'] = $photo->id;


        }


        Auth::user()->posts()->whereId($id)->first()->update($input);


        return redirect('/admin/posts');
    }

    public function destroy($id)
    {
        //
        $post = Post::findOrFail($id);

        $post->delete();
//        unlink(public_path() . $post->photo->file);
//
//        $post->delete();

        return redirect('/admin/posts');
    }

    public function post($id){


        $post = Post::findOrFail($id);
        $cats = Category::all();


        $comments = $post->comments()->whereIsActive(1)->get();



        return view('post', compact('post', 'comments', 'cats'));


    }
}
