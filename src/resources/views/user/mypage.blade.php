@extends('layouts.app')

@section('title', 'マイページ')

@section('content')
    <h2 class="text-center mb-5">マイページ</h2>
    <div class="border bg-light shadow-sm p-5 mb-5">
        <div class="row mb-3">
            <div class="col-md-6 col-12 offset-md-0 text-center">
                <img src="{{ asset('images/free_icon.png') }}" class="" alt="..."
                    style="width: 150px; height: 150px;">
            </div>
            <div class="col-md-6 col-12 offset-md-0">
                <span class="badge bg-warning px-2 py-1 mb-1">名前</span>
                <p class="fs-3">{{ $userInfo->name }}</p>
                <span class="badge bg-warning px-2 py-1 mb-1">性別</span>
                <p>{{ $sex }}</p>
                <span class="badge bg-warning px-2 py-1 mb-1">年代</span>
                <p>{{ $userInfo->age }}</p>
                <span class="badge bg-warning px-2 py-1 mb-1">メールアドレス</span>
                <p>{{ $userInfo->email }}</p>
                <span class="badge bg-warning px-2 py-1 mb-1">ランク</span>
                <p>{{ $userInfo->rank->name }}</p>
            </div>
        </div>
        <form action="{{ route('user.edit', ['id' => auth::id()]) }}" method="get">
            <div class="row justify-content-md-around">
                <a class="col-md-5 col-10 offset-md-0 offset-1 btn-block btn btn-secondary  mb-4 mb-md-0"
                    href="{{ route('index') }}">戻る</a>
                <button class="col-md-5 col-10 offset-md-0 offset-1 btn-block btn btn-primary mt-0"
                    type="submit">編集する</button>
            </div>
        </form>
    </div>
@endsection
