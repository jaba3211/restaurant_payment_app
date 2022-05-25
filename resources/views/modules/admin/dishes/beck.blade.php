@extends('parent')
@section('content')
    <main class="d-flex justify-content-center app-screen-height" style="background:#FCFAEB;">
        <div class="container-fluid">
            <div class="text-center  my-3">
                <a href="{{ route('dishes.create',['restaurant_id' => $restaurant_id])  }}" class="btn btn-success">კერძის დამატება</a>
            </div>

            <div class="d-flex align-items-center flex-column main-comps-container">
                <div class="cards-group w-100">
                    @include('modules.admin.dishes.beck_list')
                </div>
            </div>
        </div>
    </main>
@endsection
