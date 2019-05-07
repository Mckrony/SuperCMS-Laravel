<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class PostCommentController extends Controller
{
    public function index()
    {
        //
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
        $input['photo_id']=$user->photo->path;
        Comment::create($input);
        $request->session()->flash('message', 'Your comment has been published');
        return redirect()->back();
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
}
