@extends('layouts.app')

@section('content')
<div class="float-left">
    <h2>コース</h2>
</div>
<div class="float-right">
    <a class="btn btn-primary" href="/courses/create">＋ 新しいコース</a>
</div>
<div class="clearfix"></div>


<div class="mt-3 mb-3 clearfix">
    @foreach ($courses as $course)
        <div class="card float-left mr-3 mb-3" style="width: 18rem;">
            <div class="card-body">
                <h2 class="card-title">
                    <a href="/courses/{{ $course->id }}">{{ $course->title }}</a>
                </h2>
                <p class="card-text">
                    @component('components.btn-action')
                        @slot('table', '/courses')
                        @slot('id', $course->id)
                    @endcomponent
                </p>
            </div>
        </div>
    @endforeach
</div>
@endsection
