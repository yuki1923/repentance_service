{{-- @extends('layouts.app')

@section('title', 'ユーザー登録ページ')

@section('content')
    <div class="container">
        <h2 class="text-center mb-4">パスワード再設定</h2>
        <form class="form p-5" action="{{ route('password.update') }}" method="post">
            @csrf
            <div class="form-group mb-4">
                <label class="mr-3" for="email">メールアドレス</label>
                <p class="text-danger">
                    @error('email')
                        {{ $message }}
                    @enderror
                </p>
                <input type="text" class="form-control shadow-sm" name="email" id="email"
                    value="{{ old('email') }}">
            </div>
            <div class="form-group mb-4" style="position: relative">
                <label class="mr-3" for="passField">パスワード</label>
                <p class=" text-danger p-1">
                    @error('password')
                        {{ $message }}
                    @enderror
                </p>
                <input type="password" id="passField" class="form-control shadow-sm" name="password"
                    value="{{ old('password') }}">
                <input type="checkbox" id="showPassToggle" name="passview">
                <label for="showPassToggle">パスワードを表示する</label>
            </div>
            <div class="form-group mb-4" style="position: relative">
                <label class="mr-3" for="passField">パスワード（再入力）</label>
                <input type="password" id="passField" class="form-control shadow-sm" name="confirmPassword"
                    value="{{ old('confirmPassword') }}">
            </div>
            <button class="btn btn-primary btn-block mb-4" type="submit">登録</button>
        </form>

    </div>
@endsection --}}

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Reset Password') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('password.request') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-group row">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                        value="{{ $email ?? old('email') }}" required autofocus>

                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                        name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password"
                                        class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}"
                                        name="password_confirmation" required>

                                    @if ($errors->has('password_confirmation'))
                                        <span class="invalid-feedback">
                                            <strong>{{ $errors->first('password_confirmation') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Reset Password') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
