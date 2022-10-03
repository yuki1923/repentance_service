@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="text-center mb-4">パスワード再発行</h2>
        <form class="form p-5" action="{{ route('password.email') }}" method="post">
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
            <button class="btn btn-primary btn-block mb-4" type="submit">送信</button>
        </form>
    </div>
@endsection
