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
                        <label>公開<input type="radio" name="release_state" value="public" @if ($releaseState == 'public') checked @endif></label>
                        <label>非公開<input type="radio" name="release_state" value="private" @if ($releaseState == 'private') checked @endif></label>
                    </td>
                </tr>
                <tr>
                    <th>席名称&nbsp;<span class="badge badge-danger">必須</span></th>
                    <td><input class="form-control" type="text" name="title" value="{{ old('title') ?: $tableType->title }}"></td>
                </tr>

                <tr>
                    <th>席の利用時間&nbsp;<span class="badge badge-danger">必須</span></th>
                    <td>
                        <?php $startTime = old('start_time') ?? \Carbon\Carbon::parse($tableType->start_time)->format('H:i')?>
                        <?php $endTime = old('end_time') ?? \Carbon\Carbon::parse($tableType->end_time)->format('H:i')?>
                        利用開始時間
                        <select name="start_time">
                            @for ($i = 0; $i < 24; $i++)
                                @for ($j = 0; $j < 2; $j++)
                                    @if ($j == 0)
                                        <?php $value = sprintf("%02d", $i). ":00";?>
                                        <option @if ($startTime == $value) selected @endif value="{{ $value }}">{{ $value }}</option>
                                    @else
                                        <?php $value = sprintf("%02d", $i). ":30";?>
                                        <option @if ($startTime == $value) selected @endif value="{{ $value }}">{{ $value }}</option>
                                    @endif
                                @endfor
                            @endfor
                        </select>
                        〜
                        利用終了時間
                        <select name="end_time">
                            @for ($i = 0; $i < 24; $i++)
                                @for ($j = 0; $j < 2; $j++)
                                    @if ($j == 0)
                                        <?php $value = sprintf("%02d", $i). ":00";?>
                                        <option @if ($endTime == $value) selected @endif value="{{ $value }}">{{ $value }}</option>
                                    @else
                                        <?php $value = sprintf("%02d", $i). ":30";?>
                                        <option @if ($endTime == $value) selected @endif value="{{ $value }}">{{ $value }}</option>
                                    @endif
                                @endfor
                            @endfor
                        </select>
                    </td>
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
                        <label>可<input type="radio" name="connectable" value="1" @if ($connectable == '1') checked @endif></label>
                        <label>不可<input type="radio" name="connectable" value="0" @if ($connectable == '0') checked @endif></label>
                    </td>
                </tr>
            </table>
            <input class="btn btn-primary" type="submit" value="送信">
        </form>
    </div>

    <a class="btn btn-light" href="/table_types">戻る</a>

@endsection
