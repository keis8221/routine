@extends('layouts.app')

@section('content')
<div class="container mt-4">
  <div class="row d-flex justify-content-center">
    <div class="row col-12">

      <div class="col-3  d-md-block">
        @include('sidebar.list')
      </div>

      <div class="col-7 offset-md-4">
        @include('routines.list', compact('routines'))
      </div>
    </div>
  </div>
</div>
@endsection


