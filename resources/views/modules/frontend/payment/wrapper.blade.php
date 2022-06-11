@extends('parent')
@section('content')
    <main class="d-flex justify-content-center align-items-center app-screen-height" style="background:#FCFAEB;">
        <div class="container-fluid">
            <div class="container">
                <h2 class="text-center mb-5">
                    How could you pay?
                </h2>
                @include('modules.frontend.payment.form')
            </div>

        </div>
    </main>
@endsection
