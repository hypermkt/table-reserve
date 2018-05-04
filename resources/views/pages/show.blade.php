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

<a href="/pages">戻る</a>

@endsection
