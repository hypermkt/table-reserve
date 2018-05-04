@extends('layouts.app')

@section('content')
    @component('components.validation-error')
        @slot('errors', $errors)
    @endcomponent

    <form action="/pages" method="post">
        {{ csrf_field() }}
    <table border="1">

        <tr>
            <th>ページ名</th>
            <td><input type="text" name="title"></td>
        </tr>
        <tr>
            <th>説明</th>
            <td><textarea name="description"></textarea></td>
        </tr>
        <tr>
            <th>公開状態</th>
            <td>
                公開<input type="radio" name="release_state" value="public">
                非公開<input type="radio" name="release_state" value="private">

            </td>
        </tr>
    </table>
        <input type="submit" value="送信">
    </form>

    <a href="/pages">戻る</a>

@endsection
