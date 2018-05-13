@extends('layouts.app')

@section('content')
<div id="app">
    <setting-general-component restaurant-id="{{ $restaurant_id }}"></setting-general-component>
</div>
@endsection
