@extends('layouts.app')

@section('title', '投稿詳細')

@section('content')

@include('nav')

<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="mb-3">
                @include('routines.card')
            </div>
        </div>

        <div class="mb-3">
            <ul class="list-group card mt-3">
                <li class="card-header comment-card-header text-white text-center">コメント</li>
                @guest
                <li class="list-group-item text-center">
                    <p class="mb-0">
                    <a href="{{ route('login') }}">ログイン</a>
                    <span class="text-muted">するとコメントできるようになります。</span>
                    </p>
                </li>
                @endguest

                @auth
                
                <!-- コメント投稿フォーム -->
                @include('comments.form')

                @endauth
                @foreach ($comments as $comment)
                <!-- コメント一覧 -->
                    @include('comments.card')
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection