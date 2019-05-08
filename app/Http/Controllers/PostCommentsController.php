<?php


namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class PostCommentsController extends Controller
{

    public function index()
    {
        $comments = Comment::all();


        return view('admin.comments.index', compact('comments'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {

        $user = Auth::user();
        $input['post_id']=$request->post_id;
        $input['author']=$user->name;
        $input['email']=$user->email;
        $input['body']=$request->body;
        $input['photo']=$user->photo->file;
        Comment::create($input);
        $request->session()->flash('message', 'Your comment has been published');
        return redirect()->back();
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);

        $comments = $post->comments;


        return view('admin.comments.show', compact('comments'));
    }

    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        Comment::findOrFail($id)->update($request->all());

        return redirect('/admin/comments');
    }


    public function destroy($id)
    {
        Comment::findOrFail($id)->delete();

        return redirect()->back();
    }

    public function ass(Request $request){
        return dd($request);
    }
}
