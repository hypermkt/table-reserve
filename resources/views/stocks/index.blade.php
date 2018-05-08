@extends('layouts.app')

@section('content')
    <h2>在庫管理</h2>
    <h3>{{ $baseDate }}</h3>

    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <li class="page-item"><a class="page-link" href="/stocks?month={{ $prevMonth }}">Previous</a></li>
            <li class="page-item"><a class="page-link" href="/stocks?month={{ $nextMonth }}">Next</a></li>
        </ul>
    </nav>

    <div class="form-group">
        <form action="/stocks" method="post">
            {{ @csrf_field() }}
            <table class="table table-bordered bg-white" border="1">
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
            <input class="btn btn-primary" type="submit" value="送信">
        </form>
    </div>
    <a class="btn btn-light" href="/">トップページに戻る</a>
@endsection
