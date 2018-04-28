<form action="{{ url($table . '/' . $id) }}" method="post">
    @csrf
    @method('DELETE')
    <button type="submit">
        削除
    </button>
</form>