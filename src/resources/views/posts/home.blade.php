@extends('layouts.app')

@section('title', 'トップページ')

@section('content')
    <div class="row">
        <div class="col-sm-6 d-flex justify-content-center align-items-center flex-column">
            <h2 class="text-wrap mb-4 w-100 text-center">あやまることから <br>はじめよう</h2>
            <a class="btn btn-success w-50" href="{{ route('index') }}">Start</a>
        </div>
        <!-- イメージ画像 -->
        <div class="col-sm-6">
            <img class="img-fluid" src="{{ asset('images/Feeling sorry-bro.png') }}" alt="">
        </div>
    </div>
@endsection
