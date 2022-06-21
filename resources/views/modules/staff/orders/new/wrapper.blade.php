@extends('parent')
@section('content')
    <main class="d-flex justify-content-center app-screen-height" style="background:#FCFAEB;">
        <div class="container-fluid">
            <div class="container">
                <div class="d-flex align-items-center flex-column ">
                    <h2 class=" my-5 text-center">
                        Orders
                    </h2>
                    @include('modules.staff.orders.new.list')
                </div>
            </div>
        </div>
    </main>
@endsection
