@extends('layouts.app')

@section('content')

@component('components.alert-success')
@endcomponent

<div class="float-left">
    <h2>席タイプ</h2>
</div>
<div class="float-right">
    <a class="btn btn-primary" href="/table_types/create">＋ 新しい席タイプ</a>
</div>
<div class="clearfix"></div>

<div class="mt-3 mb-3 clearfix">
    @foreach ($tableTypes as $tableType)
        <div class="card float-left mr-3 mb-3" style="width: 18rem;">
            <div class="card-body">
                <h2 class="card-title">
                    <a href="/table_types/{{ $tableType->id }}">{{ $tableType->title }}</a>
                </h2>
                <p class="card-text">
                    @component('components.btn-action')
                        @slot('table', '/table_types')
                        @slot('id', $tableType->id)
                    @endcomponent
                </p>
            </div>
        </div>
    @endforeach
</div>
@endsection
