@extends('parent')
@section('content')
    <main class="d-flex justify-content-center app-screen-height" style="background:#FCFAEB;">
        <div class="container-fluid">
            <div class="d-flex align-items-center flex-column main-comps-container">
                <div class="text-center  my-3">
                    <a href="{{ route('register') }}" class="btn btn-success">Add staff </a>
                </div>
                <div class="cards-group w-100">
                    @include('modules.admin.staff.list')
                </div>
            </div>
        </div>
    </main>
@endsection

