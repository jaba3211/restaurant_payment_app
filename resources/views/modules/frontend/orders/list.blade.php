@foreach($list as $row)
    @php
        $date = $row->created_at->format('d/m/Y H:m:s')
    @endphp
    <div class="card w-100 mb-3 mycard" style="background:#f2d4812e;">
        <div class="card-body">
            <div class="d-flex justify-content-between flex-wrap">
                <h5 class="card-title text-success">{{ $row->payment_id == IN_CACHE ? 'In cache' : 'By card' }}</h5>
                <h6 class="card-subtitle mb-2 text-muted">{{ $date }}</h6>
            </div>
            <p class="fw-bold">Restaurant Name: <span class="text-success">{{ $row->restaurant->name }}</span></p>
            <a href="{{ route('orders.inside', ['date' => $row->created_at]) }}" class="card-link fw-bold d-block" style="color:#eaaa13;">See Order Details</a>
        </div>
    </div>
@endforeach
