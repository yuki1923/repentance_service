@extends('layouts.app')

@section('title', '懺悔詳細ページ')

@section('content')
    <h2 class="text-center mb-5 border-bottom">{{ $postData->title }}</h2>
    <div class="form-group  mb-5">
        <label class="form-label" for="repentance">懺悔内容</label>
        @if ($contributorFlg)
            <form action="{{ route('post.delete', ['id' => $postData->id]) }}" method="post"
                onsubmit="return deleteConfirm()">
                @csrf
                <button type="submit" id="js-delete-alert" class="float-right btn btn-secondary mb-2" href=""><i
                        class="fa-solid fa-trash-can"></i>
                    削除</button>
            </form>
            <a href="{{ route('post.edit', ['id' => $postData->id]) }}" class="float-right btn btn-primary mr-2 mb-2"><i
                    class="fa-solid fa-pen-to-square"></i> 編集</a>
        @endif
        <textarea class="form-control mb-2" cols="30" rows="10" readonly>{{ $postData->text }}</textarea>
        @if (!$postData->isLikedBy(Auth::id()))
            <i id="likeBtn" class="fa-solid fa-heart" data-post-id="{{ $postData->id }}"></i>
            <span class="like-counter">{{ $post_likes_count }}</span>
        @else
            <i id="likeBtn" class="fa-solid fa-heart liked" data-post-id="{{ $postData->id }}"></i>
            <span class="like-counter">{{ $post_likes_count }}</span>
        @endif
    </div>
    @empty($comment)
        <form class="form" action="{{ route('comment.store') }}" method="post">
            @csrf
            <div class="form-group  mb-5">
                <label class="form-label" for="comment">コメント</label>
                @error('comment')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                <textarea class="form-control" name="comment" id="comment" cols="30" rows="10"></textarea>
                <input type="hidden" name="post_id" value="{{ $postData->id }}">
            </div>
            <div class="d-md-flex">
                <button class=" btn-block btn btn-primary" type="submit">コメントする</button>
                <a class="btn-block btn btn-secondary mt-sm-0 ml-sm-2" href="{{ route('index') }}">戻る</a>
            </div>
        </form>
    @endempty
    @isset($comment)
        <label class="form-label">コメント</label>
        <textarea class="form-control" cols="30" rows="10" readonly>{{ $comment->text }}</textarea>
        <a href="{{ route('user.show', $comment->user->id) }}">{{ $comment->user->name }}</a>
    @endisset
@endsection
