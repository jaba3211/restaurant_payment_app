@extends('parent')
@section('content')
    @php
        $url = auth() ? route('bucket.add',['dish_id' => $row->id]) : route('authorization')
    @endphp
    <main class="d-flex justify-content-center align-items-center app-screen-height" style="background:#FCFAEB;">
        <div class="container-fluid mb-3">
            <div class="container">
                <div class="d-flex align-items-center flex-column main-comps-container">
                    <h2 class="menu_title my-5">
                        {{ $row->restaurant->name }}
                    </h2>
                    @if(!empty(session('success')))
                        <h1 style="color: green">{{ session('success') }}</h1>
                    @endif
                    <div class="card mb-3"  style="width:85%">
                        <img src="{{ url('/storage/'.$row->image) }}" class="card-img-top" alt="{{ $row->name }}">
                        <div class="card-body">
                            <h5 class="card-title" style="color: #ef9e4c;">{{ $row->name }}</h5>
                            <p class="card-text">{{ $row->description }}</p>
                            <h4 class="card-text" style="color: #f4c553">{{ $row->price }}₾</h4>
                            <a href="{{ $url }}"
                               style="background: #153a1e; color:#fff;"
                               class="btn">ADD TO CART
                            </a>
                        </div>
                    </div>
                    <a href="{{ route('bucket') }}" class="btn" style="background: #f4c553; color:#fff;">SEE ORDER</a>
                </div>
            </div>
        </div>
    </main>
@endsection
