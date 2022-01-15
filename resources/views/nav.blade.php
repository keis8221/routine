<nav class="navbar navbar-expand-lg fixed-top">
    <div class="container">
        <a class="navbar-brand text-white-50" href="{{ url('/') }}">{{ config('app.name', 'SHEARU') }}</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" style=""></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav">
            @guest
                <li class="nav-item">
                    <a class="nav-link text-white-50" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link text-white-50" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                @auth
                    <li class="nav-item">
                        <a class="nav-link text-white-50" href="{{ route('routines.index') }}">投稿一覧</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white-50" href="{{ route('routines.create') }}">投稿する</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-white-50" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        {{ Auth::user()->name }}さん
                        </a>
                        <ul class="dropdown-menu dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a href="{{ route('users.show', ['id' => Auth::user()->id]) }}">Myroutine</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                <form id="logout-button" method="POST" action="{{ route('logout') }}">
                    @csrf
                </form>
                @endauth
            @endguest
            </ul>
        </div>
    </div>
</nav>