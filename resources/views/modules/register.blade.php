@extends('parent')
@section('content')
{{--    {{ dd($firstname) }}--}}
    <main class="d-flex justify-content-center align-items-center app-screen-height" style="background:#FCFAEB;">
    <div class="container-fluid">
        <div class="container">
            <div class="d-flex align-items-center flex-column main-comps-container">
                <h2 class="login_form_heading text-center mb-5">
                    Sign Up
                </h2>
                <form action="{{ route('register') }}" method="POST" class="w-100">
                    @csrf

                    @if(!empty(session('success')))
                        <h1 style="color: green">{{ session('success') }}</h1>
                    @endif

                    @error('firstname')
                        <p style="color: red">{{ $message }}</p>
                    @enderror
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" id="firstName" placeholder="Name" name="firstname" value="{{ old('firstname') }}">
                    </div>
                    @error('lastname')
                        <p style="color: red">{{ $message }}</p>
                    @enderror
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" id="lastname" placeholder="Surname" name="lastname" value="{{ old('lastname') }}">
                    </div>
                    @error('username')
                     <p style="color: red">{{ $message }}</p>
                    @enderror
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" id="username" placeholder="Username" name="username" value="{{ old('username') }}">
                    </div>
                    @error('mobile_number')
                        <p style="color: red">{{ $message }}</p>
                    @enderror
                    <div class="form-group mb-3">
                        <input type="number" class="form-control" id="mobile_number" placeholder="Phone number" name="mobile_number" value="{{ old('mobile_number') }}">
                    </div>
                    @error('password')
                        <p style="color: red">{{ $message }}</p>
                    @enderror
                    <div class="form-group mb-3">
                        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                    </div>
                    @error('confirm_password')
                     <p style="color: red">{{ $message }}</p>
                    @enderror
                    <div class="form-group mb-3">
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Repeat password">
                    </div>
                    <button type="submit" class="btn" style="background:#153a1e; color:#fff">Sign Up</button>
                    <div class="my-3">
                        Already have an account?
                        <a href="{{ route('authorization') }}" style="color: #ee9f4a;">Sign In</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
