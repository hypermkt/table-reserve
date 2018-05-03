<html lang="{{ app()->getLocale() }}">
<head>
    <title>アプリ名 - @yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<div id="app" class="container">
    @yield('content')
</div>
<script src="/js/app.js"></script>
</body>
</html>