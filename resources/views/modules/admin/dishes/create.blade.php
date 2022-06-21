@extends('parent')
@section('content')
<main class="d-flex justify-content-center align-items-center app-screen-height" style="background:#FCFAEB;">
    <div class="container-fluid pb-5">
        <div class="container">
            <div class="d-flex align-items-center flex-column main-comps-container">
                <div class="text-start w-100 my-3">
                    <a href="{{ route('dishes', ['restaurant_id' => $restaurant_id]) }}" class="btn btn-warning">Back To Dishes</a>
                </div>
                <h2 class="login_form_heading text-center my-3 text-warning">
                    Add Dish To The Menu
                </h2>
                @include('modules.admin.dishes.forms')
            </div>
        </div>
    </div>
</main>
@endsection
