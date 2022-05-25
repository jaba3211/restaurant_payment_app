@extends('parent')
@section('content')
{{--    {{ dd($firstname) }}--}}
    <main class="d-flex justify-content-center align-items-center app-screen-height" style="background:#FCFAEB;">
    <div class="container-fluid">
        <div class="container">
            <div class="d-flex align-items-center flex-column main-comps-container">
                <h2 class="login_form_heading text-center mb-5">
                    რეგისტრაცია
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
                        <input type="text" class="form-control" id="firstName" placeholder="სახელი" name="firstname" value="{{ old('firstname') }}">
                    </div>
                    @error('lastname')
                        <p style="color: red">{{ $message }}</p>
                    @enderror
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" id="lastname" placeholder="გვარი" name="lastname" value="{{ old('lastname') }}">
                    </div>
                    @error('username')
                     <p style="color: red">{{ $message }}</p>
                    @enderror
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" id="username" placeholder="მომხმარებლის სახელი" name="username" value="{{ old('username') }}">
                    </div>
                    @error('mobile_number')
                        <p style="color: red">{{ $message }}</p>
                    @enderror
                    <div class="form-group mb-3">
                        <input type="number" class="form-control" id="mobile_number" placeholder="ტელეფონის ნომერი" name="mobile_number" value="{{ old('mobile_number') }}">
                    </div>
                    @error('password')
                        <p style="color: red">{{ $message }}</p>
                    @enderror
                    <div class="form-group mb-3">
                        <input type="password" class="form-control" id="password" placeholder="პაროლი" name="password">
                    </div>
                    @error('confirm_password')
                     <p style="color: red">{{ $message }}</p>
                    @enderror
                    <div class="form-group mb-3">
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="გაიმეორეთ პაროლი">
                    </div>
                    <button type="submit" class="btn" style="background:#153a1e; color:#fff">რეგისტრაცია</button>
                    <div class="my-3">
                        უკვე დარეგისტრირებული ხართ?
                        <a href="{{ route('authorization') }}" style="color: #ee9f4a;">შესვლა</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection
