<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\CommentReply;
use App\Post;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $posts = count(Post::all());
        $users = count(User::all());
        $comments = count(Comment::all());
        $comments_replies = count(CommentReply::all());
        $category = count(Category::all());

        $array[] = [$posts, $users, $comments, $comments_replies, $category];

        return view('admin.index', compact('posts', 'users', 'comments', 'comments_replies', 'category'));
//        return view('admin.index')->with('counters', json_encode($array));
        return view('admin.index', compact('array'));
        //return $array;
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
}
