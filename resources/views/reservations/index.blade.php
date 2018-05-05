@extends('layouts.app')

@section('content')
    <h2>コース一覧</h2>
    <table>
        @foreach ($courses as $course)
        <tr>
            <td>{{ $course->title }}</td>
            <td>
                <button>予約する</button>
                <button>コース詳細</button>
            </td>
        </tr>
        @endforeach
    </table>

@endsection
