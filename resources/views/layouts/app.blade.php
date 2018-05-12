<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="/css/app.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>

<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
    <h5 class="my-0 mr-md-auto font-weight-normal"><a href="/">TableReserve</a></h5>
    <nav class="my-2 my-md-0 mr-md-3">
        @if (Auth::check())
            <ul class="nav" >
                <li class="nav-item p-2">
                    <a class="text-dark" href="/reservations/calendars">予約カレンダー</a>
                </li>
                <li class="nav-item p-2">
                    <a class="text-dark" href="/reservations/books">予約台帳</a>
                </li>
                <li class="nav-item p-2">
                    <a class="text-dark" href="/table_types">席タイプ設定</a>
                </li>
                <li class="nav-item p-2">
                    <a class="text-dark" href="/courses">コース設定</a>
                </li>
                <li class="nav-item p-2">
                    <a class="text-dark" href="/stocks">在庫管理</a>
                </li>
                <li class="nav-item p-2">
                    <div class="dropdown">
                        <a class="text-dark dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            各種設定
                        </a>

                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="/settings/generals">基本設定</a>
                        </div>
                    </div>
                </li>
                <li class="nav-item pr-2">
                    <a class="btn btn-outline-success" href="/{{ Auth::user()->name }}" target="_blank">予約ページを開く</a>
                </li>
                <li class="nav-item pr-2">
                    <a class="btn btn-outline-primary" href="/auth/twitter/logout">Logout</a>
                </li>
            </ul>
        @else
            <a class="btn btn-outline-primary" href="/auth/twitter">Twitter Login</a>
        @endif
    </nav>
</div>

<div class="container">
@yield('content')
</div>

<div class="container">
    <footer class="pt-4 my-md-5 pt-md-5 border-top">
    </footer>
</div>

<script src="/js/app.js"></script>
</body>
</html>