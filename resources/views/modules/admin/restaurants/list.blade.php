@foreach($list as $row)
    <div class="card mb-2">
        <h5 class="card-header">{{ $row->name }}</h5>
        <div class="card-body">
            <a href="{{ route('restaurants.edit', ['restaurant_id' => $row['id']]) }}" class="btn btn-warning">განახლება</a>
            <a href="{{ route('restaurants.delete', ['restaurant_id' => $row['id']]) }}" class="btn btn-danger">წაშლა</a>
            <a href="{{ route('dishes', ['restaurant_id' => $row['id']]) }}" class="btn btn-primary">კერძის დამატება</a>
        </div>
    </div>
@endforeach
