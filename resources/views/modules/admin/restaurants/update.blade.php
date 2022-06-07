@extends('parent')
@section('content')
    <main class="d-flex justify-content-center align-items-center app-screen-height" style="background:#FCFAEB;">
        <div class="container-fluid">
            <div class="container">
                <div class="d-flex align-items-center flex-column main-comps-container">
                    <h2 class="login_form_heading text-center mb-5">
                        Update Restaurant
                    </h2>
                    @include('modules.admin.restaurants.forms')
                </div>
            </div>
        </div>
    </main>
@endsection
