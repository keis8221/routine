@extends('layouts.app')

@section('content')

  <div class="container my-5">
    <div class="row">
      <div class="mx-auto col-md-7">
        <div class="card">
          <h2 class="h4 card-header text-center ext-white" style="background-color: #087CA7">ユーザー登録</h2>
          <div class="card-body">

            <div class="user-form my-4">
              <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="name">
                    ユーザー名
                    <small class="text-danger">（必須）</small>
                  </label>
                  <input class="form-control" type="text" id="name" name="name" value="{{ old('name') }}" placeholder="※15文字以内">
                </div>

                <div class="form-group">
                  <label for="email">
                    メールアドレス
                    <small class="text-danger">（必須）</small>
                  </label>
                  <input class="form-control" type="text" id="email" name="email" value="{{ old('email') }}" placeholder="例）example@co.jp">
                </div>

                <div class="form-group">
                  <label for="password">
                    パスワード
                    <small class="text-danger">（必須）</small>
                  </label>
                  <input class="form-control" type="password" id="password" name="password" placeholder="※8文字以上">
                </div>

                <div class="form-group">
                  <label for="password_confirmation">
                    パスワードの確認
                    <small class="text-danger">（必須）</small>
                  </label>
                  <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" placeholder="再入力してください">
                </div>

                <div class="form-group">
                  <label for="sex">
                    性別
                    <small class="text-danger">（必須）</small>
                  </label>
                  <br>
                    <input type="radio" name="sex" value="男">男性
                    <input type="radio" name="sex" value="女">女性
                  <br>
                </div>

                <div class="form-group">
                  <label for="age">
                    年齢
                    <small class="text-danger">（必須）</small>
                  </label>
                  <input class="form-control" type="" id="age" name="age" placeholder="">
                </div>

                <div class="form-group">
                  <label for="profile_image">
                    プロフィール画像
                    <small class="blue-grey-text">（任意）</small>
                  </label>
                  <input  type="file" id="profile_image" name="profile_image" accept="image/*">
                </div>

                <div class="form-group">
                  <label for="self_introduction">
                    自己紹介
                    <small class="text-danger">（必須）</small>
                  </label>
                  <input class="form-control" type="text" id="self_introduction" name="self_introduction" placeholder="">
                </div>

                <button class="btn btn-block mt-2 mb-2" type="submit">
                  <span class="h6">ユーザー登録</span>
                </button>
              </form>

              <div class="mt-3">
                <a href="{{ route('login') }}" class="text-primary">ログインはこちら</a>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
