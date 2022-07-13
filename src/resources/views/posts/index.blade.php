@extends('layouts.app')

@section('title', 'トップページ')

@section('content')
    <h2 class="text-center mb-5"><span class="border-bottom">みんなの懺悔</span></h2>
    <form class="input-group mb-5" action="" method="get">
        <input type="text" id="txt-search" class="form-control input-group-prepend" placeholder="キーワードを入力">
        <span class="input-group-btn input-group-append">
            <button type="submit" id="btn-search" class="btn btn-primary"><i class="fas fa-search"></i> 検索</button>
        </span>
    </form>
    <div class="table-responsive">
        <table class="table table-hover mb-5">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">投稿日</th>
                    <th scope="col">ユーザー</th>
                    <th scope="col">タイトル</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($allPosts as $post)
                    <tr data-href="{{ route('post.show', ['id' => $post->id]) }}" style="cursor: pointer;">
                        <td scope="row" style="border-bottom: 1px #989898 solid;">
                            {{ $post->created_at->format('Y-n-j G:i') }}
                        </td>
                        <td scope="row" style="border-bottom: 1px #989898 solid;">
                            {{ $post->user->name }}</td>
                        <td style="border-bottom: 1px #989898 solid">{{ $post->title }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- ページネーション -->
    {{ $allPosts->links('vendor.pagination.original_pagination_view') }}

@endsection
