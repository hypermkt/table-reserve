@extends('layouts.app')

@section('content')
<a href="/courses/create">コースを登録する</a>

<table border="1">
    <tr>
        <th>ID</th>
        <th>公開状態</th>
        <th>区分</th>
        <th>メニュー名</th>
        <th>料金</th>
        <th>滞在時間(分)</th>
        <th>Action</th>
    </tr>
@foreach ($courses as $course)
    <tr>
        <td>{{ $course->id }}</td>
        <td>{{ $course->release_state }}</td>
        <td>{{ $course->kind }}</td>
        <td>{{ $course->title }}</td>
        <td>{{ $course->price }}</td>
        <td>{{ $course->duration_minutes }}</td>
        <td>
            <a href="/courses/{{ $course->id }}">詳細</a>
            <a href="/courses/{{ $course->id }}/edit">編集</a>
            @component('components.btn-del')
                @slot('table', 'courses')
                @slot('id', $course->id)
            @endcomponent
        </td>
    </tr>
@endforeach
</table>

<a href="/">トップページに戻る</a>
@endsection
