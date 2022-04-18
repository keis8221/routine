@extends('layouts.app')

@section('content')
  <div class="container my-5">
    <div class="row">
      <div class="mx-auto col-md-7 new-post">
        <div class="card new-post ">
          <h4 class="card-header text-center routine-form-header">ルーティンを投稿しましょう！</h4>
          <div class="card-text">
              @include('routines.form')
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection