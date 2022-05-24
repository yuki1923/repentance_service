@extends('layouts.app')

@section('title', '編集ページ')

@section('content')
    <h2 class="text-center mb-4">懺悔編集</h2>
    <form class="form p-5" action="{{ route('update', ['id' => $editData->id]) }}" method="post">
        @csrf
        <div class="form-group mb-4">
            <label class="form-label" for="title">タイトル ※30文字以内</label>
            @error('title')
                <p class="text-danger">{{ $message }}</p>
            @enderror
            <input type="text" class="form-control" name="title" id="title" value="{{ $editData->title }}">
        </div>
        <div class="form-group  mb-5">
            <label class="form-label" for="repentance">懺悔内容</label>
            @error('text')
                <p class="text-danger">{{ $message }}</p>
            @enderror
            <textarea class="form-control" name="text" id="repentance" cols="30" rows="10">{{ $editData->text }}</textarea>
        </div>
        <div class="d-md-flex">
            <button class=" btn-block btn btn-primary" type="submit">編集する</button>
            <a class="btn-block btn btn-secondary mt-sm-0 ml-sm-2"
                href="{{ route('show', ['id' => $editData->id]) }}">戻る</a>
        </div>
    </form>
@endsection
