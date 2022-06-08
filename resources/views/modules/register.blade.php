@extends('parent')
@section('content')
    <main class="d-flex justify-content-center align-items-center app-screen-height" style="background:#FCFAEB;">
    <div class="container-fluid">
        <div class="container">
            <div class="d-flex align-items-center flex-column main-comps-container">
                <h2 class="login_form_heading text-center mb-5">
                    Sign Up
                </h2>
                @include('modules.register_form')
            </div>
        </div>
    </div>
</main>
@endsection
