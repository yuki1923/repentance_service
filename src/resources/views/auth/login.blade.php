@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-center mb-4">ログイン</h2>
        <form class="form p-5" action="" method="post">
            @csrf
            <div class="form-group mb-4">
                <label for="email">メールアドレス</label>
                <p class=" text-danger p-1">
                    @error('email')
                        {{ $message }}
                    @enderror
                </p>
                <input type="text" class="form-control" name="email" id="email" value="{{ old('email') }}">
            </div>
            <div class="form-group mb-4">
                <label class="mr-3" for="passField">パスワード</label>
                <p class=" text-danger p-1">
                    @error('password')
                        {{ $message }}
                    @enderror
                </p>
                <input type="password" id="passField" class="form-control" name="password" value="{{ old('password') }}">
                <input type="checkbox" id="showPassToggle" name="passview">
                <label for="showPassToggle">パスワードを表示する</label>
            </div>

            <button class="btn btn-primary btn-block mb-4" type="submit">ログイン</button>
            <div class="mb-4">
                <a href="{{ route('register') }}" class="border-bottom border-primary">はじめての方はこちら</a>
            </div>
            <div>
                <a href="" class="border-bottom border-primary">パスワードを忘れた方はこちら</a>
            </div>
        </form>
    </div>
@endsection
