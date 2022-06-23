@extends('parent')
@section('content')
    <main class="d-flex justify-content-center app-screen-height" style="background:#FCFAEB;">
        <div class="container-fluid">
            <div class="d-flex align-items-center flex-column main-comps-container">
                @if($templateName == 'staff')
                    <div class="text-center  my-3">
                        <a href="{{ route('register') }}" class="btn btn-success">Add staff </a>
                    </div>
                @elseif($templateName == 'user')
                    <div class="text-center  my-3">
                        <form action="" method="GET" class="d-flex">
                            <input class="form-control me-2" type="search" name="search" value="{{ $word }}" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-success" type="submit" style="background: #153a1e; color:#fff;">Search</button>
                        </form>
                    </div>
                @endif
                @if(!empty(session('success')))
                    <h1 style="color: green">{{ session('success') }}</h1>
                @endif
                <div class="cards-group w-100 restaurants_list_from_admin">
                    @include('modules.admin.users.list')
                </div>
            </div>
        </div>
    </main>
@endsection

