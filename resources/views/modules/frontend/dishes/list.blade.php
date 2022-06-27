@php
    $cart = \Cart::getContent();
    $url = auth() ? route('bucket.add.multi') : route('authorization')
@endphp
<form action="{{ $url }}" method="POST" class="w-100">
    @csrf
    @foreach($list as $row)
        @php
            $checked = $cart->where('id', $row->id)->count() ? 'checked' : '';
        @endphp
        <div class="mb-3 trigger_card">
            <div class="dishes d-flex align-items-center w-100 card shadow-sm flex-row flex-wrap position-relative">
                <span>
                    <img src="{{ url('/storage/'.$row->image) }}" alt="{{ $row->image }}" class="img-fluid" width="150">
                </span>
                <span class="menu_cat_name ms-3 fw-bold">
                    {{ $row->name }}
                    <span class="d-block fw-normal" style="font-size:14px;">{{ $row->short_desc }}</span>
                    <span class="dish_price mb-3 d-block">{{ $row->price }}₾</span>
                </span>
                <input type="checkbox" {{ $checked }} name="dish_ids[]" value="{{ $row->id }}" class="form-check-input trigger">
            </div>
            <div>
                <a href="{{ route('dishes.show', ['dish_id' => $row->id, 'name' => $row->name]) }}" class=" text-white btn btn-success w-100">See More</a>
            </div>
        </div>
    @endforeach
    <button type="submit" class="rounded-circle btn btn-danger position-fixed fs-3 add_check_btn" style="bottom:20px; right:20px; width:80px; height:80px;">Add</button>
</form>
