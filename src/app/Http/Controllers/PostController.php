<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Comment;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Auth;
use Throwable;

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
        try {
            \DB::beginTransaction();
            $user_id = auth()->id();
            Post::create([
                'user_id' => $user_id,
                'title' => $request->title,
                'text' => $request->text,
            ]);
            \DB::commit();
        } catch (\Throwable $e) {
            \DB::rollback();
        }
        session()->flash('flash_message', '投稿が完了しました');
        return redirect()->route('index');
    }

    public function show($id)
    {
        $postData = Post::where('id', $id)->first();
        $contributorFlg = $postData->isContributor($postData->user_id);
        $comment = Comment::where('post_id', $id)->first();
        return view('posts.detail', compact('postData', 'contributorFlg', 'comment'));
    }

    public function edit($id)
    {
        $editData = Post::findOrFail($id);
        return view('posts.edit', compact('editData'));
    }

    public function update(PostRequest $request, $id)
    {
        try {
            \DB::beginTransaction();
            $post = Post::findOrFail($id);
            $post->title = $request->title;
            $post->text = $request->text;
            $post->save();
            \DB::commit();
        } catch (\Throwable $e) {
            \DB::rollback();
            abort(500);
        }
        session()->flash('flash_message', '更新しました');
        return redirect()->route('index');
    }

    public function delete($id)
    {
        if (empty($id)) {
            session()->flash('flash_message', 'データが存在しません');
            return redirect()->route('index');
        }
        try {
            Post::findOrFail($id)->delete();
        } catch (\Throwable $e) {
            abort(500);
        }
        session()->flash('flash_message', '削除が完了しました');
        return redirect()->route('index');
    }

    public function getAllMyPosts($id)
    {
        try {
            $myPosts = Post::where('user_id', '=', $id)->latest()->paginate(10);
            return view('user.post_history', compact('myPosts'));
        } catch (\Throwable $e) {
            abort(500);
        }
    }
}
