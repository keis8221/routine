@extends('layouts.app')

@section('content')
<div class="container mt-5" >
    <div class="row">
      <div class="mx-auto col-md-7" style="margin-top: 60px;">
        <div class="card mt-3" style="border-radius: 10px;">
          <h2 class="h4 card-header text-center text-white" style="border-radius: 10px 10px 0px 0px; background-color: #087CA7;">ログイン</h2>
          <div class="card-body">
            <div class="user-form my-4">
              <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                  <label for="email">メールアドレス</label>
                  <input class="form-control mb-3" type="text" style="border-radius: 20px;" id="email" name="email" value="{{ old('email') }}">
                </div>

                <div class="form-group">
                  <label for="password">パスワード</label>
                  <input class="form-control mb-3" type="password" style="border-radius: 20px;" id="password" name="password" >
                </div>

                <!-- 次回から自動でログインする(remember meトークン) -->
                <input type="hidden" name="remember" id="remember" value="on">

                <div class="d-flex justify-content-between">
                  <button class="btn" type="submit" text-while>
                    ログイン
                  </button>
                  <a href="" class="btn p-3" style="background-color: #05B2DC;">
                    かんたんログイン
                  </a>
                </div>

              </form>

              <div class="mt-3">
                <a href="{{ route('register') }}" class="text-primary">ユーザー登録はこちら</a>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
