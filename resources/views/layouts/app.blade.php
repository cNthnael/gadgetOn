<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" type="image/x-icon" href="{{ url('images/favicon.ico') }}" />
    <title>@yield('title')</title>

    {{-- Styles --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    {{-- Scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

</head>
<body>
    <div id="app" class="bg-light" style="height: auto">
        @auth()
            @if(\Illuminate\Support\Facades\Auth::user()->is_admin)
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" style="position: fixed; width: 100%; left: 0; top: 0; z-index: 1;">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ url('images/logo.png') }}" width="130" alt="">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav me-auto">
                                <a href="{{ route('list') }}" type="button" class="btn btn-sm btn-outline-success">
                                    Manage Product
                                </a>
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <div class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Hi, {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('profile') }}">
                                        Profile
                                    </a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </ul>
                    </div>
                </div>
            </nav>
            @else
                <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm" style="position: fixed; width: 100%; left: 0; top: 0; z-index: 1;">
                    <div class="container">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            <img src="{{ url('images/logo.png') }}" width="130" alt="">
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <!-- Left Side Of Navbar -->
                            <ul class="navbar-nav me-auto">
                                <div class="container-fluid">
                                    <form class="d-flex" action="{{ url('/') }}">
                                        <input class="form-control me-2 col-md-6" style="width: 120%" type="search" name="search" placeholder="Search Phone..." aria-label="Search">
                                        <button class="btn btn-outline-success" type="submit"><i class="fa fa-search"></i></button>
                                    </form>
                                </div>
                            </ul>

                            <!-- Right Side Of Navbar -->
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item">
                                        <?php
                                        $checkout = \App\Models\Transaction::query()->where('user_id', optional(Auth::user())->id)->where('status', 0)->first();
                                        if (!empty($checkout))
                                        {
                                            $notif = \App\Models\Cart::query()->where('transaction_id', $checkout->id)->count();
                                        }
                                        ?>
                                    <a class="nav-link" href="{{ url('cart')}}/{{ \Illuminate\Support\Facades\Auth::user()->id }}">
                                        <i class="fa fa-shopping-cart fa-xl"></i>
                                        @if(!empty($notif))
                                            <span class="badge rounded-pill text-bg-danger">{{ $notif }}</span>
                                        @endif
                                    </a>
                                </li>

                                <div class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        Hi, {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ url('profile') }}">
                                            Profile
                                        </a>

                                        <a class="dropdown-item" href="{{ route('history') }}">
                                            Checkout History
                                        </a>

                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </ul>
                        </div>
                    </div>
                </nav>
            @endif
        @elseguest()
            <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm " style="position: fixed; width: 100%; left: 0; top: 0; z-index: 1;">
                <div class="container">
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ url('images/logo.png') }}" width="130" alt="">
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav me-auto">
                            <div class="container-fluid">
                                <form class="d-flex" action="{{ url('/') }}">
                                    <input class="form-control me-2 col-md-6" style="width: 120%" type="search" name="search" placeholder="Search Phone..." aria-label="Search">
                                    <button class="btn btn-outline-success" type="submit"><i class="fa fa-search"></i></button>
                                </form>
                            </div>
                        </ul>

                        <!-- Center Of Navbar -->
                        <ul>

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
                            <!-- Authentication Links -->
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        </ul>
                    </div>
                </div>
            </nav>
        @endauth
        <main class="py-4 mb-6" style="margin-bottom: 60px; margin-top: 60px;width: 100%; height: 100%; padding-top: 102px">
            @yield('content')
        </main>
            <footer class="bg-danger d-flex flex-wrap justify-content-between align-items-center mt-4 py-3 border-down" style="position: page; width: 100%; left: 0; bottom: 0">
                <div class="col-md-4 d-flex align-items-center">
                    <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
                        <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"></use></svg>
                    </a>
                    <span class="mb-3 mb-md-0 text-light">© 2022 GadgetOn, Inc</span>
                </div>

                <ul class="nav col-md-4 me-4 justify-content-end list-unstyled d-flex">
                    <li class="ms-3"><a class="text-light text-decoration-none" href="https://www.twitter.com">Twitter</a></li>
                    <li class="ms-3"><a class="text-light text-decoration-none" href="https://www.facebook.com">Facebook</a></li>
                    <li class="ms-3"><a class="text-light text-decoration-none" href="https://www.instagram.com">Instagram</a></li>
                </ul>
            </footer>
    </div>
    @include('sweetalert::alert')
</body>
</html>
