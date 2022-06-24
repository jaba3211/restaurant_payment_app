@extends('parent')
@section('content')
<main class="d-flex justify-content-center app-screen-height" style="background:#FCFAEB;">
    <div class="container-fluid">
        <div class="container mb-5">
            <div class="d-flex align-items-center flex-column main-comps-container flex-wrap">
                <h2 class="menu_title my-5">
                    table {{ $list[0]->table }}
                </h2>
                <span class="fs-3 d-block mt-3 text-danger fw-bold mb-5">
                    {{ $list[0]->payment_id == IN_CACHE ? 'In cache' : 'By card'  }}
                </span>
                <div class="cards-group w-100 restaurants_list_from_admin">
                    @include('modules.staff.orders.new.show_list')
                </div>
            </div>
            <div class="order_price mt-3 fs-3 text-center">
                Order price : <span class="text-danger fw-bold">{{ $sum }}₾</span>
            </div>
            <div class="text-center">
                <a href="{{ route('staff.submit.order', ['date' => $date]) }}" class="btn btn-success mt-3">Submit order</a>
            </div>
        </div>

    </div>
</main>
@endsection