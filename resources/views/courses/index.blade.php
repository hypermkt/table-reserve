@extends('layouts.app')

@section('content')

@component('components.alert-success')
@endcomponent

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
                @if ($course->release_state == 'public')
                    <span class="badge badge-danger">公開中</span>
                @else
                    <span class="badge badge-secondary">非公開</span>
                @endif
                <h2 class="card-title">
                    <a href="/courses/{{ $course->id }}">{{ $course->course_name }}</a>
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
