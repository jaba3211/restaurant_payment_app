@extends('parent')
@section('content')
    <main class="d-flex justify-content-center app-screen-height" style="background:#FCFAEB;">
        <div class="container-fluid">
            <div class="d-flex align-items-center flex-column main-comps-container">
                <h2 class="login_form_heading text-center my-4">
                    MY ORDERS
                </h2>
                <div class="cards-group w-100 restaurants_list_from_admin">
                    @include('modules.frontend.orders.list')
                </div>
            </div>
        </div>
    </main>
@endsection
