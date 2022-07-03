@foreach($list as $row)
<div class="dishes d-flex align-items-center w-100 card mb-3 shadow-sm flex-row flex-wrap single_order_product padd_bot">
    <span>
        <img src="{{ url('/storage/'.$row->attributes[0]) }}" alt="{{ $row->name }}" class="img-fluid h-100 single_orger_image_from_staff" width="200">
    </span>
    <span class="menu_cat_name ms-3 fw-bold">
        <div>
            {{ $row->name }}
            <div class="dish_price">
                <span class="price_sum">{{ $row->price }}</span>
                <span>₾</span>
            </div>
        </div>
        <form action="{{ route('bucket.update', ['dish_id' => $row->id]) }}" method="POST">
            @csrf
            <div class="d-flex justify-content-between">
                <button type="button" class="btn bg-light border rounded-circle d-flex justify-content-center align-items-center minus_btn" style="width: 37px; height: 37px; font-size: 18px;">-</button>
                <input type="text" value="{{ $row->quantity }}" name="quantity" class="form-control w-25 d-inline dish_quantity">
                <button type="button" class="btn bg-light border rounded-circle d-flex justify-content-center align-items-center plus_btn" style="width: 37px; height: 37px; font-size: 18px;">+</button>
                <button type="submit" class="order_confirm_btn">
                    <ion-icon name="checkmark" size="large"></ion-icon>
                </button>
                <a href="{{ route('bucket.remove',['dish_id' => $row->id]) }}" class="order_remove_btn">
                    <ion-icon name="close" size="large"></ion-icon>
                </a>
            </div>
        </form>
    </span>
</div>
@endforeach