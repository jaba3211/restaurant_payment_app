@extends('parent')
@section('content')
    <main class="d-flex justify-content-center app-screen-height" style="background:#FCFAEB;">
        <div class="container-fluid">
            <div class="d-flex align-items-center flex-column main-comps-container">
                <h2 class="login_form_heading text-center my-4">
                    YOUR ORDER
                </h2>
                <h3 class="card-title text-success">{{ $list[0]->payment_id == IN_CACHE ? 'In cache' : 'By card' }}</h3>
                <div class="cards-group w-100 mt-3">
                    @include('modules.frontend.orders.show_list')
                </div>
                <div class="order_price mt-3 fs-3">
                    SUM: <span class="text-danger fw-bold">{{ $sum }}₾</span>
                </div>
            </div>
        </div>
    </main>
@endsection
