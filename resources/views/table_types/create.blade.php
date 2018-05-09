@extends('layouts.app')

@section('content')
    @component('components.validation-error')
        @slot('errors', $errors)
    @endcomponent

    <div class="form-group">
        <form action="/table_types" method="post">
            {{ csrf_field() }}
            <table class="table table-bordered bg-white" border="1">
                <tr>
                    <th>公開状態&nbsp;<span class="badge badge-danger">必須</span></th>
                    <td>
                        公開<input type="radio" name="release_state" value="public">
                        非公開<input type="radio" name="release_state" value="private">
                    </td>
                </tr>
                <tr>
                    <th>席名称&nbsp;<span class="badge badge-danger">必須</span></th>
                    <td><input class="form-control" type="text" name="title"></td>
                </tr>
                <tr>
                    <th>利用開始時間&nbsp;<span class="badge badge-danger">必須</span></th>
                    <td><input class="form-control" type="text" name="start_time"></td>
                </tr>
                </tr>
                <tr>
                    <th>利用終了時間&nbsp;<span class="badge badge-danger">必須</span></th>
                    <td><input class="form-control" type="text" name="end_time"></td>
                </tr>
                <tr>
                    <th>定員数&nbsp;<span class="badge badge-danger">必須</span></th>
                    <td>
                        <select name="minimum_capacity">
                        @for ($i = 1; $i < 10; $i++)
                            <option>{{ $i }}</option>
                        @endfor
                        </select>
                        〜
                        <select name="max_capacity">
                        @for ($i = 1; $i < 10; $i++)
                            <option>{{ $i }}</option>
                        @endfor
                        </select>
                        名
                    </td>
                </tr>
                <tr>
                    <th>販売可能数&nbsp;<span class="badge badge-danger">必須</span></th>
                    <td><input class="form-control" type="text" name="number_of_sales"></td>
                </tr>
                <tr>
                    <th>コネクト&nbsp;<span class="badge badge-danger">必須</span></th>
                    <td>
                        可<input type="radio" name="connectable" value="1">
                        不可<input type="radio" name="connectable" value="0">
                    </td>
                </tr>
            </table>
            <input class="btn btn-primary" type="submit" value="送信">
        </form>
    </div>
    <a class="btn btn-light" href="/table_types">戻る</a>

@endsection
