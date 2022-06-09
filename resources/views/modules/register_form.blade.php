@php
    $url = $templateName == 'create' ? route('register') : route('staff.update', ['username' => $row->username]);
@endphp
<form action="{{ $url }}" method="POST" class="w-100">
    @csrf

    @if(!empty(session('success')))
        <h1 style="color: green">{{ session('success') }}</h1>
    @endif

    @error('firstname')
    <p style="color: red">{{ $message }}</p>
    @enderror
    <div class="form-group mb-3">
        <input type="text" class="form-control" id="firstName" placeholder="Name" name="firstname"
               value="{{ $templateName == 'create'? old('firstname') : $row->firstname }}">
    </div>
    @error('lastname')
    <p style="color: red">{{ $message }}</p>
    @enderror
    <div class="form-group mb-3">
        <input type="text" class="form-control" id="lastname" placeholder="lastname" name="lastname"
               value="{{ $templateName == 'create'? old('lastname') : $row->lastname }}">
    </div>
    @error('username')
    <p style="color: red">{{ $message }}</p>
    @enderror
    <div class="form-group mb-3">
        <input type="text" class="form-control" id="username" placeholder="Username" name="username"
               value="{{ $templateName == 'create'? old('username') : $row->username }}">
    </div>
    @error('mobile_number')
    <p style="color: red">{{ $message }}</p>
    @enderror
    <div class="form-group mb-3">
        <input type="number" class="form-control" id="mobile_number" placeholder="Phone Number" name="mobile_number"
               value="{{ $templateName == 'create'? old('mobile_number') : $row->mobile_number }}">
    </div>
    @if(isAdmin())
        <div class="form-group mb-3">
            <select class="form-select" aria-label="Default select example" name="restaurant_id" id="category_id">
                <option>Choose restaurant</option>
                @include('modules.restaurant_list',
                 ['restaurant_id' => $templateName == 'create'? '' : $row->restaurant_id]
                 )
            </select>
        </div>
    @endif
    @if($templateName == 'create')
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
    @endif
    <button type="submit" class="btn" style="background:#153a1e; color:#fff">{{ $templateName == 'create'? 'Sign Up' : 'update' }}</button>
    @if($templateName == 'create')
        <div class="my-3">
            Already have an account?
            <a href="{{ route('authorization') }}" style="color: #ee9f4a;">Sign In</a>
        </div>
    @else
        <div class="my-3">
            <a href="{{ route('staff.edit.password', ['username' => $row->username]) }}" style="color: #ee9f4a;">Update password</a>
        </div>
    @endif
</form>
