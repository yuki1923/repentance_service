@extends('layouts.app')

@section('title', '過去の投稿')

@section('content')
    <h2 class="text-center mb-5"><span class="border-bottom">過去の投稿</span></h2>
    <div class="table-responsive">
        <table class="table table-hover mb-5">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">投稿日</th>
                    <th scope="col">タイトル</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($myPosts as $post)
                    <tr data-href="{{ route('post.show', ['id' => $post->id]) }}" style="cursor: pointer;">
                        <td scope="row" style="border-bottom: 1px #989898 solid;">
                            {{ $post->created_at->format('Y-n-j G:i') }}
                        </td>
                        <td style="border-bottom: 1px #989898 solid">{{ $post->title }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @if ($myPosts->isEmpty())
            <p class="text-center">まだ投稿がありません。</p>
        @endif
    </div>
    <!-- ページネーション -->
    {{ $myPosts->links('vendor.pagination.original_pagination_view') }}

@endsection
