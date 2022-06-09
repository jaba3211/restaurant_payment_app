@extends('parent')
@section('content')
    <main class="d-flex justify-content-center app-screen-height" style="background:#FCFAEB;">
        <div class="container-fluid">
            <div class="d-flex align-items-center flex-column main-comps-container">
                <h2 class="login_form_heading text-center my-4">
                    RESTAURANT ORDERS
                </h2>
                <div class="cards-group w-100">
                    @include('modules.staff.orders.old.list')
                </div>
            </div>
        </div>
    </main>

@endsection
