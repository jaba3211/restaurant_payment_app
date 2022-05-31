@foreach($list as $row)
    <a href="{{ route('dishes.front',['category_id' => $row->id]) }}" class="d-block w-100 text-decoration-none">
        <div class="menu_category d-flex justify-content-between align-items-center w-100 card mb-3 p-3 shadow-sm">
            <span class="menu_cat_icon">
                <img src="{{ asset('/storage/images/'.$row->image) }}" alt="{{ $row['name'] }}" class="img-fluid" width="100">
            </span>
            <span class="menu_cat_name fs-3">
                {{ $row['name'] }}
            </span>
        </div>
    </a>
@endforeach
