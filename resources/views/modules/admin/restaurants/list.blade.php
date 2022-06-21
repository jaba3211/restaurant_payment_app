@foreach($list as $row)
<div class="card mb-2 mycard">
    <h5 class="card-header">{{ $row->name }}</h5>
    <h6 class="card-header text-info bg-transparent">ID: {{ $row->id }}</h6>
    <div class="card-body">
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
                <a href="{{ route('restaurants.delete', ['restaurant_id' => $row['id']]) }}" class="btn btn-danger">DELETE</a>
            </div>
        </div>

        <a href="{{ route('restaurants.edit', ['restaurant_id' => $row['id']]) }}" class="btn btn-warning delete_confirm_btn">UPDATE</a>

        <a href="{{ route('dishes', ['restaurant_id' => $row['id']]) }}" class="btn btn-primary admin_change_btn" style="background:#f0bb18; border:0;">DISHES</a>
        <a href="{{ route('categories', ['restaurant_id' => $row['id']]) }}" class="btn btn-secondary admin_change_btn" style="background:#73ee73; border:0;">CATEGORIES</a>

    </div>
</div>
@endforeach
