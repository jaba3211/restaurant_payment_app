@extends('parent')
@section('content')
    <main class="d-flex justify-content-center align-items-center app-screen-height" style="background:#FCFAEB;">
        <div class="container-fluid">
            <div class="container">
                <div class="d-flex align-items-center flex-column main-comps-container">
                    <form action="{{ route('log_in') }}" method="POST" class="w-100">
                        @csrf
                        <h2 class="login_form_heading text-center mb-5">
                            Sign In
                        </h2>
                        <div class="col-12 mb-3">
                            @if(!empty(session('error')))
                                 <h4 style="color: red">{{ session('error') }}</h4>
                            @endif
                            @if(!empty(session('success')))
                                <h1 style="color: green">{{ session('success') }}</h1>
                            @endif
                            @error('username')
                                <p style="color: red">{{ $message }}</p>
                            @enderror
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text  h-100" style="background: #f4c553">
                                        <ion-icon name="person"></ion-icon>

                                    </div>
                                </div>
                                <input type="text" class="form-control" id="username" name="username" placeholder="username" value="{{ old('username') }}">
                            </div>
                        </div>
                        @error('password')
                            <p style="color: red">{{ $message }}</p>
                        @enderror
                        <div class="col-12 mb-3">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text  h-100" style="background: #f4c553;">
                                        <ion-icon name="key"></ion-icon>
                                    </div>
                                </div>
                                <input type="password" class="form-control" id="password" name="password" placeholder="password">
                            </div>
                        </div>
                        <div class="mb-4 text-danger">
                            Need an account ?
                            <a href="{{ route('registration') }}" style="color:#f4c553;">Sign Up!</a>
                        </div>

                        <button type="submit" class="btn" style="background:#153a1e; color:#fff">Sign In</button>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
