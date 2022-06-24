@foreach($list as $row)
    <div class="dishes d-flex align-items-center w-100 card  mb-3 shadow-sm flex-row flex-wrap single_order_product">
        <span>
            <img src="{{ url('storage/'.$row->dish->image) }}" alt="{{ $row->dish->name }}" class="img-fluid single_orger_image_from_staff" width="200">
        </span>
        <span class="menu_cat_name ms-3 fw-bold w-100">
            <div class="text-warning mt-2">
                {{ $row->dish->name }}
                <div class="dish_price">
                    <p class="raodenoba text-dark">Quantity: <span class="text-success">{{ $row->quantity }}</span></p>
                    <span class="price_sum">{{ $row->quantity*$row->dish->price }}</span>
                    <span>₾</span>
                </div>
            </div>
        </span>
    </div>
@endforeach
