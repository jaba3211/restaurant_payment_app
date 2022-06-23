@extends('parent')
@section('content')
<main class="d-flex justify-content-center app-screen-height align-items-center" style="background:#FCFAEB;">
    <div class="container-fluid">
        <div class="d-flex align-items-center flex-column main-comps-container">
            <div class="text-center  my-3">
                <h1 style="color: #153a1e">Reset Password </h1>
            </div>
            <form action="{{ route('staff.update.password', ['username' => $username]) }}" method="POST" class="w-100 create_form">
                @csrf

                @error('password')
                <p style="color: red">{{ $message }}</p>
                @enderror
                <div class="col-12 form-group mb-3">
                    <input type="password" class="form-control" id="password" placeholder="New Password" name="password">
                </div>

                @error('confirm_password')
                <p style="color: red">{{ $message }}</p>
                @enderror
                <div class="col-12 form-group mb-3">
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Repeat Password">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn" style="background:#153a1e; color:#fff">RESET</button>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection