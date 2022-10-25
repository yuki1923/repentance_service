<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Comment;
use App\Http\Requests\PostRequest;
use App\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Throwable;

class PostController extends Controller
{
    public function home()
    {
        return view('posts.home');
    }

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
        $post_likes_count = Post::withCount('likes')->findOrFail($id)->likes_count;
        return view('posts.detail', compact('postData', 'contributorFlg', 'comment', 'post_likes_count'));
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

    public function like(Request $request)
    {
        $user_id = Auth::user()->id;
        $post_id = $request->post_id;
        $already_liked = Like::where('user_Id', $user_id)->where('post_id', $post_id)->first();

        if (!$already_liked) {
            $like = new Like;
            $like->post_id = $post_id;
            $like->user_id = $user_id;
            $like->save();
        } else {
            Like::where('post_id', $post_id)->where('user_id', $user_id)->delete();
        }
        $post_likes_count = Post::withCount('likes')->findOrFail($post_id)->likes_count;
        $param = ['post_likes_count' => $post_likes_count,];
        return response()->json($param);
    }
}
