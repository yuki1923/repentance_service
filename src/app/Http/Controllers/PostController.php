<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Comment;
use App\Http\Requests\PostRequest;

class PostController extends Controller
{
    public function index()
    {
        $perPage = 10;
        $allPosts = Post::latest()->paginate($perPage);
        return view('posts/index', compact(['allPosts']));
    }

    public function create()
    {
        return view('posts/create');
    }

    public function store(PostRequest $request)
    {
        $user = auth()->id();
        Post::create([
            'user_id' => $user,
            'title' => $request->title,
            'text' => $request->text,
        ]);
        session()->flash('flash_message', '投稿が完了しました');
        return redirect()->route('index');
    }
}
