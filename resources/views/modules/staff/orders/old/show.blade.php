@extends('parent')
@section('content')
    <main class="d-flex justify-content-center app-screen-height" style="background:#FCFAEB;">
        <div class="container-fluid">
            <div class="d-flex align-items-center flex-column main-comps-container">
                <h2 class="login_form_heading text-center my-4">
                    Table {{ $list[0]->table }} ORDER
                </h2>
                <div class="cards-group w-100 mt-3">
                    @include('modules.staff.orders.old.show_list')
                </div>
                <div class="order_price mt-3 fs-3">
                    SUM: <span class="text-danger fw-bold">{{ $sum }}₾</span>
                </div>
            </div>
        </div>
    </main>
@endsection
