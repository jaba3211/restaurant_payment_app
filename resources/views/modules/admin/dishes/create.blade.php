@extends('parent')
@section('content')
{{--    {{ dd($restaurant_id) }}--}}
    <main class="d-flex justify-content-center align-items-center app-screen-height" style="background:#FCFAEB;">
        <div class="container-fluid">
            <div class="container">
                <div class="d-flex align-items-center flex-column main-comps-container">
                    <h2 class="login_form_heading text-center mb-5">
                        კერძის დამატება მენიუში
                    </h2>
                    <form action="{{ route('dishes') }}" method="POST" class="w-100" enctype="multipart/form-data">
                        @csrf

                        @if(!empty(session('success')))
                            <h1 style="color: green">{{ session('success') }}</h1>
                        @endif
                        @if(!empty(session('error')))
                            <h1 style="color: green">{{ session('error') }}</h1>
                        @endif

                        <div class="form-group mb-3">
                            <label for="name" class="form-label">დასახელება</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
                        </div>
                        @error('name')
                            <p style="color: red">{{ $message }}</p>
                        @enderror
                        <div class="form-group mb-3">
                            <label for="category_id" class="form-label">კატეგორია</label>
                            <select class="form-select" aria-label="Default select example" name="category_id" id="category_id">
                                <option {{ old('category_id') == null ? 'selected' : '' }}>აირჩიეთ კატეგორია</option>
                                @include('modules.admin.dishes.list')
                            </select>
                        </div>
                        @error('category_id')
                            <p style="color: red">{{ $message }}</p>
                        @enderror
                        <div class="form-group mb-3">
                            <label for="price" class="form-label">ფასი</label>
                            <input type="price" name="price" id="price" class="form-control" value="{{ old('price') }}">
                        </div>
                        @error('price')
                            <p style="color: red">{{ $message }}</p>
                        @enderror
                        <div class="form-group mb-3">
                            <label for="image" class="form-label">ფოტო</label>
                            <input class="form-control" type="file" id="image" name="image" value="{{ old('image') }}">
                        </div>
                        @error('image')
                            <p style="color: red">{{ $message }}</p>
                        @enderror
                        <div class="form-group mb-3">
                            <label for="description" class="form-label">აღწერა</label>
                            <textarea name="description" id="description" name="description" rows="5" class="form-control">{{ old('description') }}</textarea>
                        </div>
                        <input id="submit" class="btn" type="submit" style="background:#153a1e; color:#fff" value="დამატება" />
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
