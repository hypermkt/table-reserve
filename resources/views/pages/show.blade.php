@extends('layouts.app')

@section('content')

<table border="1">
    <tr>
        <th>ID</th>
        <td>{{ $page->id }}</td>
    </tr>
    <tr>
        <th>公開状態</th>
        <td>{{ $page->release_state }}</td>
    </tr>
    <tr>
        <th>ページ名</th>
        <td>{{ $page->title }}</td>
    </tr>
    <tr>
        <th>説明</th>
        <td>{{ $page->description}}</td>
    </tr>
</table>

<p><a href="/pages/{{ $page->id }}/table_types">席タイプ設定</a></p>
<p><a href="/pages/{{ $page->id }}/courses">コース設定</a></p>
<p><a href="/pages/{{ $page->id }}/stocks">在庫設定</a></p>

<a href="/pages">戻る</a>

@endsection
