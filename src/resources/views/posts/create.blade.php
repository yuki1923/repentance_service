@extends('layouts.app')

@section('title', 'トップページ')

@section('content')
    <h2 class="text-center mb-4">懺悔投稿部屋</h2>
    <form class="form p-5" action="{{ route('store') }}" method="post">
        @csrf
        <div class="form-group mb-4">
            <label class="form-label" for="title">タイトル ※30文字以内</label>
            @error('title')
                <p class="text-danger">{{ $message }}</p>
            @enderror
            <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
        </div>
        <div class="form-group  mb-5">
            <label class="form-label" for="repentance">懺悔内容</label>
            @error('text')
                <p class="text-danger">{{ $message }}</p>
            @enderror
            <textarea class="form-control" name="text" id="repentance" cols="30" rows="10">{{ old('text') }}</textarea>
        </div>
        <div class="d-md-flex">
            <button class=" btn-block btn btn-primary" type="submit">懺悔する</button>
            <a class="btn-block btn btn-secondary mt-sm-0 ml-sm-2" href="{{ route('index') }}">戻る</a>
        </div>
    </form>
@endsection
