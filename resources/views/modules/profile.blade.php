@extends('parent')
@section('content')
    <main class="d-flex justify-content-center align-items-center app-screen-height" style="background:#FCFAEB;">
        <div class="container-fluid pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class=" text-center my-5">
                            Your Profile
                        </h2>
                        @if(!empty(session('success')))
                            <h1 style="color: green">{{ session('success') }}</h1>
                        @endif
                        <div>
                            <ul class="list-group mt-3 font-weight-bold">
                                <li class="list-group-item">Name: {{ $row->firstname }}</li>
                                <li class="list-group-item">Surname: {{ $row->lastname }}</li>
                                <li class="list-group-item">Username: {{ $row->username }}</li>
                                <li class="list-group-item">Phone Number: {{ $row->mobile_number }}</li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <a href="{{ route('user.edit', ['username' => $row->username]) }}" class="btn btn-warning">UPDATE</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
