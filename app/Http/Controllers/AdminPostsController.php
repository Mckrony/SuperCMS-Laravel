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
        $posts = Post::paginate(2);



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
        //
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


    }


    public function show($id)
    {
        //
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

        unlink(public_path() . $post->photo->file);

        $post->delete();

        return redirect('/admin/posts');
    }

    public function post($slug){


        $post = Post::findBySlugOrFail($slug);

        $comments = $post->comments()->whereIsActive(1)->get();


        return view('post', compact('post','comments'));


    }
}
