@extends('parent')
@section('content')
    <main class="d-flex justify-content-center app-screen-height" style="background:#FCFAEB;">
        <div class="container-fluid">
            <div class="text-center  my-3">
                <a href="{{ route('categories.add', [ 'restaurant_id' => $restaurant_id]) }}" class="btn btn-success">Add Category</a>
            </div>
            @if(!empty(session('success')))
                <h1 style="color: green">{{ session('success') }}</h1>
            @endif
            @if(!empty(session('error')))
                <h1 style="color: green">{{ session('error') }}</h1>
            @endif
            <div class="d-flex align-items-center flex-column main-comps-container">
                <div class="cards-group w-100 restaurants_list_from_admin">
                    @include('modules.admin.categories.list')
                </div>
            </div>
        </div>
    </main>
@endsection
