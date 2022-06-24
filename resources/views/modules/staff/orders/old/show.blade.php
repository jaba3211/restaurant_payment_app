@extends('parent')
@section('content')
    <main class="d-flex justify-content-center app-screen-height" style="background:#FCFAEB;">
        <div class="container-fluid">
            <div class="d-flex align-items-center flex-column main-comps-container flex-wrap">
                <h2 class="login_form_heading text-center my-4">
                    TABLE {{ $list[0]->table }} ORDER
                </h2>
                <span class="fs-3 d-block mt-3 text-danger fw-bold">
                        {{ $list[0]->payment_id == IN_CACHE ? 'In cache' : 'By card'  }}
                </span>
                <div class="cards-group w-100 mt-3 restaurants_list_from_admin">
                    @include('modules.staff.orders.old.show_list')
                </div>
                <div class="order_price mt-3 fs-3">
                    SUM: <span class="text-danger fw-bold">{{ $sum }}₾</span>
                </div>
            </div>
        </div>
    </main>
@endsection
