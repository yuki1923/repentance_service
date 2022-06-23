@extends('layouts.app')

@section('title', 'マイページ編集')

@section('content')
    <h2 class="text-center mb-5">マイページ編集</h2>
    <div class="border bg-light shadow-sm p-5 mb-5">
        <form action="{{ route('user.update', ['id' => $userInfo->id]) }}" method="POST">
            @csrf
            <div class="row mb-3">
                <div class="col-md-6 col-12 offset-md-0 text-center">
                    <img src="{{ asset('images/free_icon.png') }}" class="" alt="..."
                        style="width: 150px; height: 150px;">
                </div>
                <div class="col-md-6 col-12 offset-md-0">
                    @error('name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <label class="badge bg-warning px-2 py-1 mb-1" for="name">名前</label>
                    <input type="text" name="name" class="form-control shadow-sm mb-3" value="{{ $userInfo->name }}">
                    <label class="badge bg-warning px-2 py-1 mb-1">性別</label>
                    <div class="form-check">
                        <input id="male" class="form-check-input" type="radio" name="sex" value="1">
                        <label class="form-check-label" for="male">
                            男性
                        </label>
                    </div>
                    <div class="form-check mb-3">
                        <input id="female" class="form-check-input" type="radio" name="sex" value="0">
                        <label class="form-check-label" for="female">
                            女性
                        </label>
                    </div>
                    @error('age')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <label class="badge bg-warning px-2 py-1 mb-1" for="age">年齢</label>
                    <input type="number" name="age" class="form-control shadow-sm mb-3" min="0" max="130"
                        value="{{ $userInfo->age }}">
                    @error('email')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                    <label class="badge bg-warning px-2 py-1 mb-1" for="email">メールアドレス</label>
                    <input type="email" name="email" class="form-control shadow-sm mb-3" value="{{ $userInfo->email }}">
                </div>
            </div>
            <div class="row justify-content-md-around">
                <a class="col-md-5 col-10 offset-md-0 offset-1 btn-block btn btn-secondary  mb-4 mb-md-0"
                    href="{{ url()->previous() }}">戻る</a>
                <button class="col-md-5 col-10 offset-md-0 offset-1 btn-block btn btn-primary mt-0"
                    type="submit">編集する</button>
            </div>
        </form>
    </div>
@endsection
