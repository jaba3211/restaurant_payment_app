@extends('parent')
@section('content')
    <main class="d-flex justify-content-center align-items-center app-screen-height" style="background:#FCFAEB;">
        <div class="container-fluid">
            <div class="container">
                <div class="d-flex align-items-center flex-column ">
                    <h2 class=" my-5 text-center">
                        შეკვეთები
                    </h2>
                    <div class="order mb-4 w-100">
                        <div class="table d-flex align-items-center w-100 card flex-row ps-2 mb-0">
                            <span class="">
                                <img src="images/cold_dishes.png" alt="" class="img-fluid" width="100">
                            </span>

                            <div class="border-0 ms-3 w-100 p-2" style="background: #ffecb3;">
                                <span class="fs-3 d-block">
                                    მაგიდა 1
                                </span>
                                <span class="fs-3 d-block mt-3 text-danger fw-bold">
                                    200₾
                                </span>
                            </div>
                        </div>
                        <a href="" class=" text-white btn btn-success w-100">შეკვეთის ნახვა</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
