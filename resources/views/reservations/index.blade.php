@extends('layouts.app')

@section('content')
    <h2>コース一覧</h2>
    <table>
        @foreach ($courses as $course)
        <tr>
            <td>{{ $course->title }}</td>
            <td>
                <a href="/{{ $username }}/{{ $course->id }}">予約する</a>
            </td>
        </tr>
        @endforeach
    </table>

@endsection
