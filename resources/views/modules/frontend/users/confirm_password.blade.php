@extends('parent')
@section('content')
    <main class="d-flex justify-content-center app-screen-height" style="background:#FCFAEB;">
        <div class="container-fluid">
            <div class="d-flex align-items-center flex-column main-comps-container">
                <div class="text-center  my-3">
                    <h4 style="color: #153a1e">Confirm password </h4>
                </div>
                @if(!empty(session('error')))
                    <p style="color: red">{{ session('error') }}</p>
                @endif
                <form action="{{ route('confirm.password', ['username' => $username]) }}" method="POST">
                    @csrf
                    @error('password')
                    <p style="color: red">{{ $message }}</p>
                    @enderror
                    <div class="form-group mb-3">
                        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                    </div>
                    <button type="submit" class="btn" style="background:#153a1e; color:#fff">Confirm</button>
                </form>
            </div>
        </div>
    </main>
@endsection
