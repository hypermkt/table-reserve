@extends('layouts.app')

@section('content')

<table class="table table-bordered bg-white" border="1">
    <tr>
        <th>ID</th>
        <td>{{ $tableType->id }}</td>
    </tr>
    <tr>
        <th>公開状態</th>
        <td>{{ $tableType->release_state }}</td>
    </tr>
    <tr>
        <th>席名称</th>
        <td>{{ $tableType->table_type_name }}</td>
    </tr>
    <tr>
        <th>利用開始時間</th>
        <td>{{ $tableType->available_start_time }}</td>
    </tr>
    <tr>
        <th>利用終了時間</th>
        <td>{{ $tableType->available_end_time }}</td>
    </tr>
    <tr>
        <th>定員数</th>
        <td>
            {{ $tableType->minimum_capacity }}
            〜
            {{ $tableType->max_capacity }}
            名
        </td>
    </tr>
    <tr>
        <th>販売可能数</th>
        <td>{{ $tableType->number_of_sales }}</td>
    </tr>
    <tr>
        <th>コネクト</th>
        <td>{{ $tableType->connectable }}</td>
    </tr>
</table>

<a class="btn btn-light" href="/table_types">戻る</a>

@endsection
