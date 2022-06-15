@extends('parent')
@section('content')
    <main class="d-flex justify-content-center align-items-center app-screen-height" style="background:#FCFAEB;">
        <div class="container-fluid">
            <div class="container">
                <div class="d-flex align-items-center flex-column main-comps-container">
                    <div class="text-start w-100 my-3">
                        <a href="{{ route('dishes', ['restaurant_id' => $restaurant_id]) }}" class="btn btn-warning">Back</a>
                    </div>
                    <h2 class="login_form_heading text-center mb-5">
                       Update Dish
                    </h2>
                    @include('modules.admin.dishes.forms')
                </div>
            </div>
        </div>
    </main>
@endsection
