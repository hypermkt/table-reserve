@extends('layouts.app')

@section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/table_types" method="post">
        {{ csrf_field() }}
    <table border="1">
        <tr>
            <th>公開状態</th>
            <td>
                公開<input type="radio" name="release_state" value="public">
                非公開<input type="radio" name="release_state" value="private">

            </td>
        </tr>
        <tr>
            <th>席名称</th>
            <td><input type="text" name="title"></td>
        </tr>
        <tr>
            <th>利用開始時間</th>
            <td><input type="text" name="start_time"></td>
        </tr>
        </tr>
        <tr>
            <th>利用終了時間</th>
            <td><input type="text" name="end_time"></td>
        </tr>
        <tr>
            <th>最低定員数</th>
            <td><input type="text" name="minimum_capacity"></td>
        </tr>
        <tr>
            <th>最大定員数</th>
            <td><input type="text" name="max_capacity"></td>
        </tr>
        <tr>
            <th>販売可能数</th>
            <td><input type="text" name="number_of_sales"></td>
        </tr>
        <tr>
            <th>コネクト</th>
            <td>
                コネクト不可<input type="radio" name="connectable" value="0">
                コネクト可<input type="radio" name="connectable" value="1">
            </td>
        </tr>
    </table>
        <input type="submit" value="送信">
    </form>

    <a href="/table_types">戻る</a>

@endsection
