@extends('parent')
@section('content')
    <main class="d-flex justify-content-center app-screen-height" style="background:#FCFAEB;">
        <div class="container-fluid">
            <div class="d-flex align-items-center flex-column main-comps-container">
                <div class="text-center  my-3">
                    <h4 style="color: #153a1e">reset password </h4>
                </div>
                <form action="{{ route('staff.update.password', ['username' => $username]) }}" method="POST">
                    @csrf

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
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Repeat Password">
                    </div>

                    <button type="submit" class="btn" style="background:#153a1e; color:#fff">Reset password</button>

                </form>
            </div>
        </div>
    </main>
@endsection
