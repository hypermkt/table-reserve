@extends('layouts.app')

@section('content')

    <form action="/courses/{{ $course->id }}" method="post">
        @csrf
        @method('put')
    <table border="1">
        <tr>
            <th>公開状態</th>
            <td>
                公開<input type="radio" name="release_state" value="public" @if ($course->release_state == 'public') checked @endif>
                非公開<input type="radio" name="release_state" value="private" @if ($course->release_state == 'private') checked @endif>

            </td>
        </tr>
        <tr>
            <th>区分</th>
            <td>
                コースメニュー<input type="radio" name="kind" value="course_menu" @if ($course->kind == 'course_menu') checked @endif>
                席のみ<input type="radio" name="kind" value="only_table" @if ($course->kind == 'only_table') checked @endif>

            </td>
        </tr>
        <tr>
            <th>メニュー名</th>
            <td><input type="text" name="title" value="{{ $course->title }}"></td>
        </tr>
        <tr>
            <th>料金</th>
            <td><input type="text" name="price" value="{{ $course->price }}"></td>
        </tr>
        </tr>
        <tr>
            <th>滞在時間（分）</th>
            <td><input type="text" name="duration_minutes" value="{{ $course->duration_minutes }}"></td>
        </tr>
    </table>
        <input type="submit" value="送信">
    </form>

    <a href="/courses">戻る</a>

@endsection
