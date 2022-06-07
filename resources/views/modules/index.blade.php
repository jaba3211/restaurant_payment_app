@extends('parent')
@section('content')
    <main class="d-flex justify-content-center align-items-center app-screen-height" style="background:#FCFAEB;">
        <div class="container-fluid">
            <div class="container">
                <div class="d-flex align-items-center flex-column main-comps-container">
                    <h1 class="app-name mb-5 text-center" style="color: #153A1E; font-size: 44px;">
                        E-PAY
                    </h1>
                    <div class="icon-in d-flex justify-content-center align-items-center mb-5">
                        <ion-icon name="restaurant-sharp"></ion-icon>
                    </div>
                    <div>
                        <a href="{{ route('scan.QR') }}" class="btn btn-success scan_place">Scan Place</a>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
