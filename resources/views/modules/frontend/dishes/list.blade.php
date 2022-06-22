
<form action="#" method="POST" class="w-100">
@foreach($list as $row)
<a href="{{ route('dishes.show', ['dish_id' => $row->id, 'name' => $row->name]) }}" class="text-decoration-none d-block w-100">
    <div class="dishes d-flex align-items-center w-100 card mb-3 shadow-sm flex-row flex-wrap">
        <span>
            <img src="{{ url('/storage/'.$row->image) }}" alt="{{ $row->image }}" class="img-fluid" width="150">
        </span>
        <span class="menu_cat_name ms-3 fw-bold">
            {{ $row->name }}
            <span class="d-block fw-normal" style="font-size:14px;">{{ $row->short_desc }}</span>
            <span class="dish_price mb-3 d-block">{{ $row->price }}₾</span>
        </span>
    </div>
</a>

@endforeach

<button type="submit" class="rounded-circle btn btn-danger position-fixed fs-3" style="bottom:20px; right:20px; width:80px; height:80px;">Add</button>

</form>