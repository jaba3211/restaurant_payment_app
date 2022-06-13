@extends('parent')
@section('content')
    <main class="d-flex justify-content-center align-items-center app-screen-height" style="background:#FCFAEB;">
        <div class="container-fluid">
            <div class="container">
                <div class="d-flex align-items-center flex-column main-comps-container">
                    <h2 class="login_form_heading text-center mb-5 text-warning">
                        Payment Details
                    </h2>
                    @include('modules.frontend.payment.payment_form')
                </div>
            </div>
        </div>
    </main>

@endsection
