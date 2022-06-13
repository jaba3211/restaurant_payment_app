@foreach($list as $row)
    <div class="dishes d-flex align-items-center w-100 card mb-3 shadow-sm flex-row single_order_product">
        <span>
        <img src="{{ url('/storage/'.$row->attributes[0]) }}" alt="{{ $row->name }}" class="img-fluid" width="200">
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
                <div class="d-flex">
                <button type="button"
                        class="btn bg-light border rounded-circle d-flex justify-content-center align-items-center minus_btn"
                        style="width: 37px; height: 37px; font-size: 18px;">-</button>
                <input type="text" value="{{ $row->quantity }}" name="quantity" class="form-control w-25 d-inline dish_quantity">
                <button type="button"
                        class="btn bg-light border rounded-circle d-flex justify-content-center align-items-center plus_btn"
                        style="width: 37px; height: 37px; font-size: 18px;">+</button>
                    <input type="submit" class="btn btn-warning" value="CHOOSE">
                    <a href="{{ route('bucket.remove',['dish_id' => $row->id]) }}" class="btn btn-danger">DELETE</a>
            </div>
            </form>
        </span>
    </div>
@endforeach
