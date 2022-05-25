@extends('parent')
@section('content')
    <main class="d-flex justify-content-center align-items-center app-screen-height" style="background:#FCFAEB;">
        <div class="container-fluid">
            <div class="container">
                <div class="d-flex align-items-center flex-column main-comps-container">
                    <h2 class="login_form_heading text-center mb-5">
                        კატეგორიის დამატება
                    </h2>
                    <form action="{{ route('categories') }}" method="POST" class="w-100" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="restaurant_name" class="form-label">კატეგორიის დასახელება</label>
                            <input type="text" name="name" id="restaurant_name" class="form-control" value="{{ old('name') }}">
                        </div>
                        <div class="form-group mb-3">
                            <label for="image" class="form-label">ფოტო</label>
                            <input class="form-control" type="file" id="image" name="image" value="{{ old('image') }}">
                        </div>
                        @error('image')
                        <p style="color: red">{{ $message }}</p>
                        @enderror
                        <button type="submit" class="btn" style="background:#153a1e; color:#fff">დამატება</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
