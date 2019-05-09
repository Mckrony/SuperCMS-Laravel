<?php

namespace App\Http\Controllers;

use App\Comment;
use App\CommentReply;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class CommentRepliesController extends Controller
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
        //
    }

    public function show($id)
    {
        //
        $comment = Comment::findOrFail($id);

        $replies = $comment->replies;


        return view(' admin.comments.replies.show', compact('replies'));
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
        CommentReply::findOrFail($id)->update($request->all());


        return redirect()->back();
    }

    public function destroy($id)
    {
        //
        CommentReply::findOrFail($id)->delete();

        return redirect()->back();

    }
    public function createReply(Request $request){

//        $user = Auth::user();
//        $data = [
//
//            'comment_id' => $request->comment_id,
//            'author'=> $user->name,
//            'email' =>$user->email,
//            'photo'=>$user->photo->file,
//            'body'=>$request->body
//        ];
//        CommentReply::create($data);
//        $request->session()->flash('reply_message','Your reply has been submitted and is waiting moderation');
//        return redirect()->back();
        $user = Auth::user();
        $input['comment_id']=$request->comment_id;
        $input['author']=$user->name;
        $input['email']=$user->email;
        $input['body']=$request->body;
        $input['photo']=$user->photo->file;
        CommentReply::create($input);
        $request->session()->flash('reply_message', 'Your reply has been submitted');
        return redirect()->back();
    }
}
