@extends('layouts.app')

@section('content')
<a href="/pages/create">ページを登録する</a>

<table border="1">
    <tr>
        <th>ID</th>
        <th>公開状態</th>
        <th>ページ名</th>
        <th>Action</th>
    </tr>
@foreach ($pages as $page)
    <tr>
        <td>{{ $page->id }}</td>
        <td>{{ $page->release_state }}</td>
        <td>{{ $page->title }}</td>
        <td>
            <a href="/{{ $page->user->name }}/{{ $page->id }}" target="_blank">予約ページを開く</a>
            <a href="/pages/{{ $page->id }}">詳細</a>
            <a href="/pages/{{ $page->id }}/edit">編集</a>
            @component('components.btn-del')
                @slot('table', 'pages')
                @slot('id', $page->id)
            @endcomponent
        </td>
    </tr>
@endforeach
</table>
@endsection
