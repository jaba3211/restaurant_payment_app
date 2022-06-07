@foreach($list as $row)
    <div class="card mb-2">
        <h5 class="card-header">{{ $row->name }}</h5>
        <h6 class="card-header text-info bg-transparent">ID: {{ $row->id }}</h6>
        <div class="card-body">
            <a href="{{ route('restaurants.edit', ['restaurant_id' => $row['id']]) }}" class="btn btn-warning">UPDATE</a>
            <a href="{{ route('restaurants.delete', ['restaurant_id' => $row['id']]) }}" class="btn btn-danger">DELETE</a>
            <a href="{{ route('dishes', ['restaurant_id' => $row['id']]) }}" class="btn btn-primary">ADD DISH</a>
        </div>
    </div>
@endforeach
