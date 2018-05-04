@extends('layouts.app')

@section('content')

<table border="1">
    <tr>
        <th>ID</th>
        <td>{{ $course->id }}</td>
    </tr>
    <tr>
        <th>席タイプ</th>
        <td>
            @foreach ($course->tableTypes as $tableType)
                <p>{{ $tableType->title }}</p>
            @endforeach
        </td>
    </tr>
    <tr>
        <th>公開状態</th>
        <td>{{ $course->release_state }}</td>
    </tr>
    <tr>
        <th>区分</th>
        <td>{{ $course->kind }}</td>
    </tr>
    <tr>
        <th>メニュー名</th>
        <td>{{ $course->title }}</td>
    </tr>
    <tr>
        <th>料金</th>
        <td>{{ $course->price }}</td>
    </tr>
    <tr>
        <th>滞在時間</th>
        <td>{{ $course->duration_minutes}}</td>
    </tr>
</table>

<a href="/pages/{{ $pageId }}/courses">戻る</a>

@endsection
