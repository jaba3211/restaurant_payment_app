@extends('parent')
@section('content')
    <main class="d-flex justify-content-center app-screen-height" style="background:#FCFAEB;">
        <div class="container-fluid">
            <div class="text-center  my-3">
                <a href="{{ route('categories.add') }}" class="btn btn-success">კატეგორიის დამატება</a>
            </div>

            <div class="d-flex align-items-center flex-column main-comps-container">
                <div class="cards-group w-100">
                    @include('modules.admin.categories.list')
                </div>
            </div>
        </div>
    </main>
@endsection
