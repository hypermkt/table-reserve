@extends('layouts.app')

@section('content')
    @component('components.validation-error')
        @slot('errors', $errors)
    @endcomponent

    <div class="form-group">
        <form action="/table_types/{{ $tableType->id }}" method="post">
            @csrf
            @method('put')
            <table class="table table-bordered bg-white" border="1">
                <tr>
                    <th>公開状態&nbsp;<span class="badge badge-danger">必須</span></th>
                    <td>
                        <?php $releaseState = old('release_state') ?? $tableType->release_state; ?>
                        公開<input type="radio" name="release_state" value="public" @if ($releaseState == 'public') checked @endif>
                        非公開<input type="radio" name="release_state" value="private" @if ($releaseState == 'private') checked @endif>
                    </td>
                </tr>
                <tr>
                    <th>席名称&nbsp;<span class="badge badge-danger">必須</span></th>
                    <td><input class="form-control" type="text" name="title" value="{{ old('title') ?: $tableType->title }}"></td>
                </tr>
                <tr>
                    <th>利用開始時間&nbsp;<span class="badge badge-danger">必須</span></th>
                    <td><input class="form-control" type="text" name="start_time" value="{{ old('start_time') ?? \Carbon\Carbon::parse($tableType->start_time)->format('H:i') }}"></td>
                </tr>
                </tr>
                <tr>
                    <th>利用終了時間&nbsp;<span class="badge badge-danger">必須</span></th>
                    <td><input class="form-control" type="text" name="end_time" value="{{  old('end_time') ?? \Carbon\Carbon::parse($tableType->end_time)->format('H:i') }}"></td>
                </tr>
                <tr>
                    <th>定員数&nbsp;<span class="badge badge-danger">必須</span></th>
                    <td>
                        <?php $minimumCapacity = old('minimum_capacity') ?? $tableType->minimum_capacity; ?>
                        <select name="minimum_capacity">
                            @for ($i = 1; $i < 10; $i++)
                                <option @if ($minimumCapacity == $i) selected @endif>{{ $i }}</option>
                            @endfor
                        </select>
                        〜
                        <?php $maxCapacity = old('max_capacity') ?? $tableType->max_capacity; ?>
                        <select name="max_capacity">
                            @for ($i = 1; $i < 10; $i++)
                                <option @if ($maxCapacity == $i) selected @endif>{{ $i }}</option>
                            @endfor
                        </select>
                        名
                    </td>
                </tr>
                <tr>
                    <th>販売可能数&nbsp;<span class="badge badge-danger">必須</span></th>
                    <td><input class="form-control" type="text" name="number_of_sales" value="{{ old('number_of_sales') ?? $tableType->number_of_sales }}"></td>
                </tr>
                <tr>
                    <th>コネクト&nbsp;<span class="badge badge-danger">必須</span></th>
                    <td>
                        <?php $connectable = old('connectable') ?? $tableType->connectable; ?>
                        可<input type="radio" name="connectable" value="1" @if ($connectable == '1') checked @endif>
                        不可<input type="radio" name="connectable" value="0" @if ($connectable == '0') checked @endif>
                    </td>
                </tr>
            </table>
            <input class="btn btn-primary" type="submit" value="送信">
        </form>
    </div>

    <a class="btn btn-light" href="/table_types">戻る</a>

@endsection
