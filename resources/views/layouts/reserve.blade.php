<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="/css/app.css" rel="stylesheet" type="text/css" media="all" />
</head>
<body>

<div id="app">
@yield('content')
</div>

<script src="/js/app.js"></script>
</body>
</html>