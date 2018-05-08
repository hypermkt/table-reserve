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
                    <th>席タイプ</th>
                    <td>
                        @foreach ($tableTypes as $tableType)
                            <input type="checkbox" name="table_types[]" value="{{ $tableType->id }}">{{ $tableType->title }}
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <th>公開状態</th>
                    <td>
                        公開<input type="radio" name="release_state" value="public">
                        非公開<input type="radio" name="release_state" value="private">

                    </td>
                </tr>
                <tr>
                    <th>区分</th>
                    <td>
                        コースメニュー<input type="radio" name="kind" value="course_menu">
                        席のみ<input type="radio" name="kind" value="only_table">
                    </td>
                </tr>
                <tr>
                    <th>メニュー名</th>
                    <td><input class="form-control" type="text" name="title"></td>
                </tr>
                <tr>
                    <th>料金</th>
                    <td><input class="form-control" type="text" name="price"></td>
                </tr>
                </tr>
                <tr>
                    <th>滞在時間(分)</th>
                    <td><input class="form-control" type="text" name="duration_minutes"></td>
                </tr>
            </table>
            <input class="btn btn-primary" type="submit" value="送信">
        </form>
    </div>

    <a class="btn btn-light" href="/courses">戻る</a>

@endsection
