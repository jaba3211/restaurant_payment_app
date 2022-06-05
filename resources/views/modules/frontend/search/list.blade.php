@foreach($list as $row)
{{--    {{ dd('sdf') }}--}}
    <div class="card w-100 mb-3">
        <div class="card-body">
            <h5 class="card-title">Name: {{ $row->name }}</h5>
            <h6 class="card-subtitle mb-2 text-muted">Category: {{ $row->category->name }}</h6>
            <p class="card-text">{{ $row->short_desc }}</p>
            <a href="{{ route('dishes.show', ['dish_id' => $row->id, 'name' => $row->name]) }}" class="card-link fw-bold" style="color:#f4c553;">READ MORE</a>
        </div>
    </div>
@endforeach
