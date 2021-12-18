@extends('layouts.app')

@section('title', $user->name)

@section('content')

    <div class="container mt-4">
        <div class="row  justify-content-center">

            <div class="col-md-9">
                @include('users.user')

                @include('users.tabs')
            </div>

        </div>

    </div>
@endsection
