@extends('layouts.app')

@section('content')

<table border="1">
    <tr>
        <th>ID</th>
        <th>公開状態</th>
        <th>席名称</th>
        <th>利用開始時間</th>
        <th>利用終了時間</th>
        <th>最低定員数</th>
        <th>最大定員数</th>
        <th>販売可能数</th>
        <th>コネクト</th>
    </tr>
@foreach ($tableTypes as $tableType)
    <tr>
        <td>{{ $tableType->id }}</td>
        <td>{{ $tableType->release_state }}</td>
        <td>{{ $tableType->title }}</td>
        <td>{{ $tableType->start_time }}</td>
        <td>{{ $tableType->end_time }}</td>
        <td>{{ $tableType->minimum_capacity }}</td>
        <td>{{ $tableType->max_capacity }}</td>
        <td>{{ $tableType->number_of_sales }}</td>
        <td>{{ $tableType->connectable }}</td>
    </tr>
@endforeach
</table>

@endsection