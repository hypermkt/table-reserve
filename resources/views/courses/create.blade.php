@extends('layouts.app')

@section('content')
    @component('components.validation-error')
        @slot('errors', $errors)
    @endcomponent

    <div class="form-group">
        <form action="/courses" method="post">
            {{ csrf_field() }}
            <table class="table table-bordered bg-white" border="1">
                <tr>
                    <th>席タイプ&nbsp;<span class="badge badge-danger">必須</span></th>
                    <td>
                        @foreach ($tableTypes as $tableType)
                            <label><input type="checkbox" name="table_types[]" value="{{ $tableType->id }}">{{ $tableType->table_type_name}}</label>
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <th>公開状態&nbsp;<span class="badge badge-danger">必須</span></th>
                    <td>
                        <label>公開<input type="radio" name="release_state" value="public" @if (old('release_state') == 'public') checked @endif></label>
                        <label>非公開<input type="radio" name="release_state" value="private" @if (old('release_state') == 'private') checked @endif></label>
                    </td>
                </tr>
                <tr>
                    <th>区分&nbsp;<span class="badge badge-danger">必須</span></th>
                    <td>
                        <label>コースメニュー<input type="radio" name="kind" value="course_menu" @if (old('kind') == 'course_menu') checked @endif></label>
                        <label>席のみ<input type="radio" name="kind" value="only_table" @if (old('kind') == 'only_table') checked @endif></label>
                    </td>
                </tr>
                <tr>
                    <th>メニュー名&nbsp;<span class="badge badge-danger">必須</span></th>
                    <td><input class="form-control" type="text" name="course_name" value="{{ old('course_name') }}"></td>
                </tr>
                <tr>
                    <th>料金&nbsp;<span class="badge badge-danger">必須</span></th>
                    <td><input class="form-control" type="text" name="price" value="{{ old('price') }}"></td>
                </tr>
                </tr>
                <tr>
                    <th>滞在時間(分)&nbsp;<span class="badge badge-danger">必須</span></th>
                    <td><input class="form-control" type="text" name="duration_minutes" value="{{ old('duration_minutes') }}"></td>
                </tr>
            </table>
            <input class="btn btn-primary" type="submit" value="送信">
        </form>
    </div>

    <a class="btn btn-light" href="/courses">戻る</a>

@endsection
