@extends('layouts.app')

@section('content')
    <p>在庫管理</p>

    <p><a href="/pages/{{ $pageId }}/stocks?month={{ $prevMonth }}">前</a></p>
    {{ $baseDate }}
    <p><a href="/pages/{{ $pageId }}/stocks?month={{ $nextMonth }}">次</a></p>
    <form action="/pages/{{ $pageId }}/stocks" method="post">
        {{ @csrf_field() }}
    <table border="1">
        <tr>
            <td>日付</td>
            @foreach ($tableTypes as $tableType)
                <td>{{ $tableType->title }}</td>
            @endforeach
        </tr>
        @for ($i = 0; $i < count($stocksTable); $i++ )
        <tr>
            <td>{{ $stocksTable[$i]['formatted_date'] }}</td>
            @foreach ($tableTypes as $tableType)
            <td>
                <p><input name="accept_dates[{{ $i }}:{{ $tableType->id }}]" type="checkbox" value="{{ $stocksTable[$i]['accept_date_value'] }}" @isset($stocksTable[$i]['acceptable_table_number']) checked @endisset>予約受付</p>
                <p><input name="acceptable_table_numbers[{{ $i }}:{{ $tableType->id }}]" type="text" size="5" value="{{ $stocksTable[$i]['acceptable_table_number']  }}">卓</p>
            </td>
            @endforeach
        </tr>
        @endfor
    </table>
        <input type="hidden" name="baseDate" value="{{ $baseDate }}">
        <input type="submit" value="送信">
    </form>
<a href="/pages/{{ $pageId }}">ページに戻る</a>
@endsection
