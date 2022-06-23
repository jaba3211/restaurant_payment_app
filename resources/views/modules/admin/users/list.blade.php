@foreach($list as $row)
@php
$url = $templateName == 'staff' ? route('user.edit', ['username' => $row->username]) : route('user.reset.password', ['username' => $row->username]);
$buttonName = $templateName == 'staff' ? 'UPDATE' : 'RESET PASSWORD';
@endphp
<div class="card mb-2 mycard mycard_dish_admin">
    <h5 class="card-header">{{ $row->username }}</h5>
    @if($templateName == 'staff')
    <h6 class="card-header text-success bg-transparent">{{ $row->restaurant->name }}</h6>
    @endif
    <div class="card-body">
        <a href="{{ $url }}" class="btn btn-warning">{{ $buttonName }}</a>
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
                <a href="{{ route('user.delete', ['username' => $row->username]) }}" class="btn btn-danger">DELETE</a>

            </div>
        </div>
    </div>
</div>
@endforeach