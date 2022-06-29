@extends('layouts.app')

@section('title', '退会')

@section('content')
    <h2 class="text-center mb-5">退会</h2>
    <div class="border bg-light shadow-sm p-5">
        <p class="text-center mb-5">データは完全に消去されますが、本当に退会してよろしいですか？</p>
        <form action="{{ route('user.destroy', ['id' => Auth::id()]) }}" method="POST">
            @csrf
            <a class="btn-block btn btn-primary w-50 mb-5 py-2 mx-auto" href="{{ route('index') }}">退会しない</a>
            <button class="btn-block btn btn-secondary w-50 py-2 m-0 mx-auto" type="submit">退会する</button>
        </form>
    </div>
@endsection
