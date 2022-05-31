@foreach($list as $row)
    <a href="{{ route('dishes.show', ['dish_id' => $row->id, 'name' => $row->name]) }}" class="text-decoration-none">
        <div class="dishes d-flex align-items-center w-100 card mb-3 shadow-sm flex-row">
            <span>
                <img src="{{ url('/images/'.$row->image) }}" alt="{{ $row->image }}" class="img-fluid" width="200">
            </span>
            <span class="menu_cat_name ms-3 fw-bold">
                {{ $row->name }}
                <span class="d-block fw-normal" style="font-size:14px;">{{ $row->short_desc }}</span>
                <span class="dish_price mb-3 d-block">{{ $row->price }}₾</span>
            </span>
        </div>
    </a>
@endforeach
