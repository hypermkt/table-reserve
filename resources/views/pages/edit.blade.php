@extends('layouts.app')

@section('content')
    @component('components.validation-error')
        @slot('errors', $errors)
    @endcomponent

    <form action="/pages/{{ $page->id }}" method="post">
        @csrf
        @method('put')
    <table border="1">
        <tr>
            <th>ページ名</th>
            <td><input type="text" name="title" value="{{ $page->title }}"></td>
        </tr>
        <tr>
            <th>説明</th>
            <td><input type="text" name="description" value="{{ $page->description}}"></td>
        </tr>
        <tr>
            <th>公開状態</th>
            <td>
                公開<input type="radio" name="release_state" value="public" @if ($page->release_state == 'public') checked @endif>
                非公開<input type="radio" name="release_state" value="private" @if ($page->release_state == 'private') checked @endif>
            </td>
        </tr>
    </table>
        <input type="submit" value="送信">
    </form>

    <a href="/pages">戻る</a>

@endsection
