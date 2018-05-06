@extends('layouts.app')

@section('content')
    <reservation-component restaurant-id="{{ $restaurant->id }}" username="{{ $username }}"></reservation-component>
@endsection
