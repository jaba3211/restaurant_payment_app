
<form action="{{ route('bucket.add',['dish_id' => $row->id]) }}" method="POST">
    @csrf
    <input type="submit" style="background: #153a1e; color:#fff;"  class="btn" value=" კალათაში დამატება">
</form>
