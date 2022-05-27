@extends('parent')
@section('content')
{{--    {{ dd($restaurant_id) }}--}}
    <main class="d-flex justify-content-center align-items-center app-screen-height" style="background:#FCFAEB;">
        <div class="container-fluid">
            <div class="container">
                <div class="d-flex align-items-center flex-column main-comps-container">
                    <h2 class="login_form_heading text-center mb-5">
                        კერძის დამატება მენიუში
                    </h2>
                    @include('modules.admin.dishes.forms')
                </div>
            </div>
        </div>
    </main>
@endsection
