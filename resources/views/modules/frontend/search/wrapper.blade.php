@extends('parent')
@section('content')
    <main class="d-flex justify-content-center app-screen-height" style="background:#FCFAEB;">
        <div class="container-fluid">
            <div class="d-flex align-items-center flex-column main-comps-container">
                <h2 class="login_form_heading text-center my-4">
                    Search Results
                </h2>
                <div class="cards-group w-100">
                    @if(empty($list) || count($list) == 0)
                        <h3 class="login_form_heading text-center my-4">No result!</h3>
                    @else
                    @include('modules.frontend.search.list')
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection
