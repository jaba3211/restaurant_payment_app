@extends('parent')
@section('content')
    <main class="d-flex justify-content-center app-screen-height" style="background:#FCFAEB;">
        <div class="container-fluid">
            <div class="container">
                <div class="d-flex align-items-center flex-column main-comps-container">
                    <h2 class="menu_title my-5">
                        table {{ $list[0]->table }}
                    </h2>
                    @include('modules.staff.orders.new.show_list')
                </div>
                <div class="order_price mt-3 fs-3">
                    Order price : <span class="text-danger fw-bold">{{ $sum }}₾</span>
                </div>
                <a href="{{ route('staff.submit.order', ['date' => $date]) }}" class="btn btn-success mt-3">Submit order</a>
            </div>

        </div>
    </main>
@endsection
