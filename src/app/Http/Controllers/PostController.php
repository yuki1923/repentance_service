<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Comment;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $perPage = 10;
        $allPosts = Post::latest()->paginate($perPage);
        return view('posts.index', compact(['allPosts']));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(PostRequest $request)
    {
        $user_id = auth()->id();
        Post::create([
            'user_id' => $user_id,
            'title' => $request->title,
            'text' => $request->text,
        ]);
        session()->flash('flash_message', '投稿が完了しました');
        return redirect()->route('index');
    }

    public function show($id)
    {
        $postData = Post::where('id', $id)->first();
        $contributorFlg = $postData->isContributor($postData->user_id);
        return view('posts.detail', compact('postData', 'contributorFlg'));
    }

    public function edit($id)
    {
        $editData = Post::findOrFail($id);
        return view('posts.edit', compact('editData'));
    }

    public function update(PostRequest $request, $id)
    {
        $post = Post::findOrFail($id);
        if ($post->user_id !== Auth::id()) {
            return abort(403);
        }
        $post->title = $request->title;
        $post->text = $request->text;
        $post->save();
        session()->flash('flash_message', '編集が完了しました');
        return redirect()->route('index');
    }

    public function delete($id)
    {
        $post = Post::findOrFail($id);
        if ($post->user_id !== Auth::id()) {
            return redirect()->route('index');
        }
        Post::findOrFail($id)->delete();
        session()->flash('flash_message', '削除が完了しました');
        return redirect()->route('index');
    }
}
