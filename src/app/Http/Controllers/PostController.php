<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use App\Comment;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $perPage = 10;
        $allPosts = Post::paginate($perPage);
        return view('posts/index', compact(['allPosts']));
    }
}
