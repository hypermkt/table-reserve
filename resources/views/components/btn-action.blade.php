<form action="{{ url($table . '/' . $id) }}" method="post">
    @csrf
    @method('DELETE')
    <a class="btn btn-primary" href="{{ url($table . '/' . $id) }}/edit">編集</a>
    <button class="btn btn-danger" type="submit">
        削除
    </button>
</form>