@extends('layouts.app')

@section('content')
    <p>在庫管理</p>

    {{ $baseDate }}
    <table border="1">
        <tr>
            <td>日付</td>
            @foreach ($tableTypes as $tableType)
                <td>{{ $tableType->title }}</td>
            @endforeach
        </tr>
        @for ($i = 1; $i <= $daysInMonth; $i++ )
        <tr>
            <td>{{ \Carbon\Carbon::parse($baseDate . '-' . $i)->format('Y-m-d(D)') }}</td>
            @foreach ($tableTypes as $tableType)
            <td></td>
            @endforeach
        </tr>
        @endfor
    </table>

<a href="/">トップページに戻る</a>
@endsection
