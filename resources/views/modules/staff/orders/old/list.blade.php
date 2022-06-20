@foreach($list as $row)
    @php
        $date = $row->created_at->format('d/m/Y H:m:s')
    @endphp
    <div class="card w-100 mb-3" style="background:#f2d4812e;">
        <div class="card-body">
            <div class="d-flex justify-content-between flex-wrap">
                <h5 class="card-title text-danger">Table {{ $row->table }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $date }}</h6>
            </div>
            <p class="fw-bold">Ordered by <span class="text-success">{{ $row->user->username }}</span></p>
            <p class="fw-bold">Staff: <span class="text-danger">{{ $row->staff->username }}</span></p>
            <span class="fs-3 d-block mt-3 text-danger fw-bold">
                {{ $row->payment_id == IN_CACHE ? 'In cache' : 'By card'  }}
            </span>
            <a href="{{ route('staff.old.orders.inside', ['table' => $row->table, 'date' => $row->created_at]) }}" class="card-link fw-bold d-block" style="color:#eaaa13;">See
                Order Details</a>
        </div>
    </div>
@endforeach
