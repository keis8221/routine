@extends('layouts.app')

@section('content')
  <div class="container my-5 ">
    <div class="row">
      <div class="mx-auto col-md-7">
        <div class="card new-post">
          <h2 class="h4 card-header text-center routine-form-header">ルーティンを投稿しましょう！</h2>
            <div class="card-text">
                @include('routines.form')
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection