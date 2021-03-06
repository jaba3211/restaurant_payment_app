@foreach($list as $row)
<div class="mycard">
    <div class="table d-flex align-items-center w-100 card flex-row ps-2 mb-0">
        <span style="width:15px;">
            <!-- <img src="{{ url('storage/cold_dish.png') }}" alt="" class="img-fluid" width="100"> -->
        </span>
        <div class="border-0 ms-3 w-100 p-2" style="background: #ffecb3;">
            <span class="fs-3 d-block">
                Table {{ $row->table }}
            </span>
            <span class="fs-3 d-block mt-3 text-danger fw-bold">
                {{ $row->payment_id == IN_CACHE ? 'In cache' : 'By card'  }}
            </span>
        </div>
    </div>
    <div class="order mb-4 w-100">
        <a href="{{ route('staff.new.orders.inside', ['table' => $row->table, 'date' => $row->created_at]) }}" class=" text-white btn btn-success w-100">See Order Details</a>
    </div>
</div>
@endforeach