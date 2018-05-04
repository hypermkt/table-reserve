@extends('layouts.app')

@section('content')
    @if (Auth::check())
        <p>your twitter handle: {{ Auth::user()->handle }}</p>
        <p><a href="/pages">予約ページ設定</a></p>
        <p><a href="/table_types">席タイプ設定</a></p>
        <p><a href="/courses">コース設定</a></p>
        <p><a href="/stocks">在庫管理</a></p>
        <a href="/auth/twitter/logout">ログアウト</a>
    @else
        <a href="/auth/twitter">Twitter Login</a>
    @endif
@endsection
