@extends('layouts.app')

@section('content')
    @component('components.validation-error')
        @slot('errors', $errors)
    @endcomponent

    <div class="form-group">
        <form action="/courses/{{ $course->id }}" method="post">
            @csrf
            @method('put')
            <table class="table table-bordered bg-white" border="1">
                <tr>
                    <th>席タイプ&nbsp;<span class="badge badge-danger">必須</span></th>
                    <td>
                        @foreach ($tableTypes as $key => $tableType)
                            <input type="checkbox" name="table_types[]" value="{{ $tableType->id }}"
                                   @if (in_array($tableType->id, $course->tableTypes->pluck('id')->toArray())) checked @endif
                            >{{ $tableType->table_type_name }}
                        @endforeach
                    </td>
                </tr>
                <tr>
                    <th>公開状態&nbsp;<span class="badge badge-danger">必須</span></th>
                    <td>
                        <?php $releaseState = old('release_state') ?? $course->release_state; ?>
                        <label>公開<input type="radio" name="release_state" value="public" @if ($releaseState == 'public') checked @endif></label>
                        <label>非公開<input type="radio" name="release_state" value="private" @if ($releaseState == 'private') checked @endif></label>
                    </td>
                </tr>
                <tr>
                    <th>区分&nbsp;<span class="badge badge-danger">必須</span></th>
                    <td>
                        <?php $kind = old('kind') ?? $course->kind; ?>
                        コースメニュー<input type="radio" name="kind" value="course_menu" @if ($kind) checked @endif>
                        席のみ<input type="radio" name="kind" value="only_table" @if ($kind) checked @endif>

                    </td>
                </tr>
                <tr>
                    <th>メニュー名&nbsp;<span class="badge badge-danger">必須</span></th>
                    <td><input class="form-control" type="text" name="course_name" value="{{ old('course_name') ?? $course->course_name }}"></td>
                </tr>
                <tr>
                    <th>料金&nbsp;<span class="badge badge-danger">必須</span></th>
                    <td><input class="form-control" type="text" name="price" value="{{ old('price') ?? $course->price }}"></td>
                </tr>
                </tr>
                <tr>
                    <th>滞在時間（分）&nbsp;<span class="badge badge-danger">必須</span></th>
                    <td><input class="form-control" type="text" name="duration_minutes" value="{{ old('duration_minutes') ?? $course->duration_minutes }}"></td>
                </tr>
            </table>
            <input class="btn btn-primary" type="submit" value="送信">
        </form>
    </div>

    <a class="btn btn-light" href="/courses">戻る</a>

@endsection
