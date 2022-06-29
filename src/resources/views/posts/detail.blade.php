@extends('layouts.app')

@section('title', '懺悔詳細ページ')

@section('content')
    <h2 class="text-center mb-5 border-bottom">{{ $postData->title }}</h2>
    <div class="form-group  mb-5">
        <label class="form-label" for="repentance">懺悔内容</label>
        @if ($contributorFlg)
            <form action="{{ route('delete', ['id' => $postData->id]) }}" method="post">
                @csrf
                <button type="submit" class="float-right btn btn-secondary mb-2" href=""><i class="fa-solid fa-trash-can"></i>
                    削除</button>
            </form>
            <a href="{{ route('edit', ['id' => $postData->id]) }}" class="float-right btn btn-primary mr-2 mb-2"><i
                    class="fa-solid fa-pen-to-square"></i> 編集</a>
        @endif
        <textarea class="form-control" cols="30" rows="10" readonly>{{ $postData->text }}</textarea>
    </div>
    <form class="form" action="" method="post">
        <div class="form-group  mb-5">
            <label class="form-label" for="repentance">返答内容</label>
            <textarea class="form-control" name="reply" id="repentance" cols="30" rows="10"></textarea>
        </div>
        <div class="d-md-flex">
            <button class=" btn-block btn btn-primary" type="submit">返答する</button>
            <a class="btn-block btn btn-secondary mt-sm-0 ml-sm-2" href="{{ route('index') }}">戻る</a>
        </div>
    </form>
@endsection
