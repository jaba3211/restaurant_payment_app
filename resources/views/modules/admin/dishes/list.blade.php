@foreach($list as $row)
<div class="card mb-2 mycard mycard_dish_admin">
    <h5 class="card-header">{{ $row->name }}</h5>
    <h6 class="card-header text-success bg-transparent">Category: {{ $row->category->name }}</h6>
    <div class="card-body d-flex">
        <div class="card_body_image card_img_dish  me-5">
            <img src="{{ url('/storage/'.$row->image) }}" alt="{{ $row->image }}" class="img-fluid dish_image_admin" width="100">
        </div>
        <div class="card_body_btns">
            <a href="{{ route('dishes.edit',['restaurant_id' => $restaurant_id, 'dish_id' => $row['id']]) }}" class="btn btn-warning body_btn">UPDATE</a>
            <!-- Button trigger modal -->
            <div class="btn btn-danger delete body_btn">DELETE</div>
            <!-- Modal -->
            <div class="delete_modal">
                <div class="modal_top d-flex justify-content-between">
                    <h6 class="modal_heading text-danger">
                        Are you sure you want to delete this item?
                    </h6>
                    <span class="close_btn">
                        <ion-icon name="close"></ion-icon>
                    </span>
                </div>
                <div class="modal_description">
                    This item will be deleted immediately. You can't undo this action!
                </div>
                <div class="modal_btns">
                    <button class="btn btn-secondary cancel_btn">CANCEL</button>
                    <a href="{{ route('dishes.delete', ['dish_id' => $row['id']]) }}" class="btn btn-danger">DELETE</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach