@foreach($list as $row)
    <div class="card mb-2">
        <h5 class="card-header">{{ $row->name }}</h5>
        <h6 class="card-header text-success bg-transparent">კატეგორია: {{ $row->category->name }}</h6>
        <div class="card-body">
            <a href="{{ route('dishes.edit',['restaurant_id' => $restaurant_id, 'dish_id' => $row['id']]) }}" class="btn btn-warning">განახლება</a>
            <a href="{{ route('dishes.delete', ['dish_id' => $row['id']]) }}" class="btn btn-danger">წაშლა</a>
        </div>
    </div>
@endforeach
