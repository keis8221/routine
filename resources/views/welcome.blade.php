@extends('layouts.app')

@section('content')
<div class="masthead">
    <div class="container px-lg-5 d-flex h-100 align-items-center justify-content-center">
        <div class="d-flex justify-content-center">
            <div class="text-center">
                <h1 class="mx-auto my-0 text-uppercase">SHEARU</h1>
                <h2 class="catch_copy text-white-50 mx-auto mt-2 mb-5">ルーティン共有アプリで<br>日々の習慣をより良くしよう</h2>
                <a class="btn text-white" style="border-radius: 30px;" href="{{ route('routines.index') }}">Get Started</a>
            </div>
        </div>
    </div>
<div>
<!-- Footer-->
<footer class="footer bg-black small text-center text-white-50">
    <div class="container px-4 px-lg-5">Copyright &copy; Your Website 2021</div>
</footer>

@endsection