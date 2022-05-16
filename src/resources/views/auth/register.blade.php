@extends('layouts.app')

@section('title', 'ユーザー登録ページ')

@section('content')
    <div class="container">
        <h2 class="text-center mb-4">新規登録</h2>
        <form class="form p-5" action="{{ route('register') }}" method="post">
            @csrf
            <div class="form-group mb-4">
                <label class="mr-3" for="email">メールアドレス</label>
                <p class="text-danger">
                    @error('email')
                        {{ $message }}
                    @enderror
                </p>
                <input type="text" class="form-control shadow-sm" name="email" id="email" value="{{ old('email') }}">
            </div>
            <div class="form-group mb-4" style="position: relative">
                <label class="mr-3" for="passField">パスワード</label>
                <p class=" text-danger p-1">
                    @error('password')
                        {{ $message }}
                    @enderror
                </p>
                <input type="text" id="passField" class="form-control shadow-sm" name="password"
                    value="{{ old('password') }}" style="position: relative;">
                <i id="showPassToggle" class="fa fa-eye" style="position:absolute; right:3%; top:70%;"></i>
            </div>
            <button class="btn btn-primary btn-block mb-4" type="submit">登録</button>
            <div>
                <a href="" class="border-bottom border-primary">登録済みの方はこちら</a>
            </div>
        </form>

    </div>
@endsection
