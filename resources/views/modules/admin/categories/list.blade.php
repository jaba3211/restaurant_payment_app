@foreach($list as $row)
    <div class="card mb-2">
        <h5 class="card-header">{{ $row->name }}</h5>
        <div class="card-body">
            <a href="{{ route('categories.edit', ['restaurant_id' => $restaurant_id, 'category_id' => $row['id']]) }}" class="btn btn-warning">UPDATE</a>
            <a href="{{ route('categories.delete', ['category_id' => $row['id']]) }}" class="btn btn-danger">DELETE</a>
        </div>
    </div>
@endforeach
