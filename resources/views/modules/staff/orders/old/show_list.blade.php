@foreach($list as $row)
<div class="card d-flex align-items-center w-100 card  mb-3 shadow-sm flex-row flex-wrap single_order_product" style="background: #76be622b;">
    <span>
        <img src="{{ url('storage/'.$row->dish->image) }}" alt="{{ $row->dish->name }}" class="img-fluid single_orger_image_from_staff" width="200">
    </span>
    <div class="card-body p-2">
        <h5 class="card-title fw-bold">
            {{ $row->dish->name }}
        </h5>
        <p class="text-secondary fw-bold mb-2 text-end" style="font-size:20px">{{ $row->quantity }}X</p>
        <p class="text-warning fw-bold text-end mb-0" style="font-size:22px">{{ $row->quantity*$row->dish->price }}₾</p>
    </div>
</div>
@endforeach