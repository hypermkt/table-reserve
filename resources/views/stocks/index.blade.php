@extends('layouts.app')

@section('content')
    <p>在庫管理</p>

    <table border="1">
        <tr>
            <td>日付</td>
            @foreach ($tableTypes as $tableType)
                <td>{{ $tableType->title }}</td>
            @endforeach
        </tr>
    </table>

<a href="/">トップページに戻る</a>
@endsection
