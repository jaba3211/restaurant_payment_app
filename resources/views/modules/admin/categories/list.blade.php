@foreach($list as $row)
<div class="card mb-2 mycard">
    <h5 class="card-header">{{ $row->name }}</h5>
    <div class="card-body d-flex">
        <div class="card_body_image me-5">
            <img src="{{ url('/storage/'.$row->image) }}" alt="{{ $row->image }}" class="img-fluid" width="100">
        </div>
        <div class="card_body_btns">
            <a href="{{ route('categories.edit', ['restaurant_id' => $restaurant_id, 'category_id' => $row['id']]) }}" class="btn btn-warning">UPDATE</a>
            <!-- Button trigger modal -->
            <div class="btn btn-danger delete">DELETE</div>
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
                    <a href="{{ route('categories.delete', ['category_id' => $row['id']]) }}" class="btn btn-danger">DELETE</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endforeach