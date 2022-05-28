@extends('parent')
@section('content')
    <main class="d-flex justify-content-center align-items-center app-screen-height" style="background:#FCFAEB;">
        <div class="container-fluid">
            <div class="container">
                <div class="d-flex align-items-center flex-column main-comps-container">
                    <h2 class="menu_title my-5">
                        {{ $row->restaurant->name }}
                    </h2>
                    <div class="card mb-3">
                        <img src="{{ asset('storage/images/'.$row->image) }}" class="card-img-top" alt="{{ $row->name }}">
                        <div class="card-body">
                            <h5 class="card-title" style="color: #153a1e;">{{ $row->name }}</h5>
                            <p class="card-text">{{ $row->description }}</p>
                            <h4 class="card-text" style="color: #f4c553">{{ $row->price }}₾</h4>
                            @include('modules.frontend.dishes.forms')
{{--                            <a href="{{ route('bucket.add',['dish_id' => $row->id]) }}" class="btn" style="background: #153a1e; color:#fff;">კალათაში დამატება</a>--}}
                        </div>
                    </div>
                    <a href="#" class="btn" style="background: #f4c553; color:#fff;">შეკვეთის ნახვა</a>
                </div>
            </div>
        </div>
    </main>
@endsection
