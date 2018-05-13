@extends('layouts.reserve')

@section('content')
    <div class="p-4">
        <div class="card">
            <div class="card-header">
                予約を進める
            </div>
            <div class="card-body">
                <reservation-component restaurant-id="{{ $restaurant->id }}" username="{{ $username }}"></reservation-component>
            </div>
        </div>
    </div>

@endsection
