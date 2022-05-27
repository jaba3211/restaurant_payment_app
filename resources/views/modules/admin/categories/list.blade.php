@foreach($list as $row)
    <div class="card mb-2">
        <h5 class="card-header">{{ $row->name }}</h5>
        <div class="card-body">
            <a href="{{ route('categories.edit', ['category_id' => $row['id']]) }}" class="btn btn-warning">განახლება</a>
            <a href="{{ route('categories.delete', ['category_id' => $row['id']]) }}" class="btn btn-danger">წაშლა</a>
        </div>
    </div>
@endforeach
